<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\group;
use Illuminate\Http\Request;


class ContactServer extends Controller
{
    public function index()
    {

        // \DB::enableQueryLog();

        $contacts = contact::OrderrBy()->Filters()->paginate(10);
        // dd(DB::getQueryLog());

        $groupsdropbox = group::DropBox('select a group');

        return view('content.contacr', compact('contacts', 'groupsdropbox'));
    }

    public function addNew()
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
            'idGroup' => 'required|exists:grops,id'
        ]);
        //dd($rqust->all());
        contact::create($rqust->all());

        return redirect()->route('Contact.home')->with('message', 'Contact has been add successfully');
    }

    public function show(Contact $contact)
    {
        return view('content.showContact', compact('contact'));
    }

    public function edite($id)
    {
        $groupsdropbox = group::DropBox('');;
        $contact = contact::find($id);
        return view('content.forms._FrmEdite', compact('contact', 'groupsdropbox'));
    }

    public function update($id, Request $rqust)
    {
        $rqust->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'idGroup' => 'required|exists:grops,id '
        ]);
        $contact = contact::find($id);
        $contact->update($rqust->all());
        return redirect()->route('Contact.home')->with('message', 'Contact has been update successfully');
    }

    public function destroy($id)
    {
        $contact = contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('Contact.home')->with('message', 'Contact has been deleate successfully');
    }
}
