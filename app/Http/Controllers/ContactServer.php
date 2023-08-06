<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\group;
use Illuminate\Http\Request;

class ContactServer extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {

        // \DB::enableQueryLog();

        $contacts = contact::OrderrBy()->Filters()->paginate(10);
        // dd( DB::getQueryLog() );

        $groupsdropbox = group::DropBox('select a group');

        return view('content.contacr', compact('contacts', 'groupsdropbox'));
    }

    public function create()
    {
        $groupsdropbox = group::orderBy('Group')->pluck('Group', 'id')->prepend('Select a Group', '');
        return view('content.forms.formCreate', compact('groupsdropbox'));
    }

    public function store(Request $rqust)
    {
        $rqust->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'idGroup' => 'required|exists:grops,id',
        ]);
        //dd( $rqust->all() );
        contact::create($rqust->all());

        return redirect()->route('Contact.index')->with('message', 'Contact has been add successfully');
    }

    public function show(Contact $contact)
    {
        //$contact = contact::find($id);
        // return \dd( $contact );
        return view('content.showContact', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        $groupsdropbox = group::DropBox('');
        // $contact = contact::find( $id );

        return view('content.forms._FrmEdite', compact('contact', 'groupsdropbox'));
    }

    public function update(Contact $contact, Request $rqust)
    {
        $rqust->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'idGroup' => 'required|exists:grops,id'
        ]);
        // $contact = contact::find( $id );

        $contact->update($rqust->all());
        return redirect()->route('Contact.index')->with('message', 'Contact has been update successfully');
    }

    public function destroy(Contact $contact)
    {
        // $contact = contact::findOrFail( $id );
        $contact->delete();

        return redirect()->route('Contact.index')->with('message', 'Contact has been deleate successfully');
    }
}
