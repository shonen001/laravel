<?php

namespace App\Http\Controllers;
use  App\Models\contact;
use  App\Models\group;

use Illuminate\Http\Request;

class ContactServer extends Controller
{
   public function index() {

    $contacts = contact::orderBy('firstName')->where(function($query) {
        if($IdGroup = request('groupID')) {
             $query->where('idGroup',$IdGroup);
        }})->paginate(5);

         $groupsdropbox = group::orderBy('Group')->pluck('Group','id')->prepend('All Groups','');
         return view('content.contacr', compact('contacts','groupsdropbox'));
   }
   public function PgCreateContact() {
    $groupsdropbox = group::orderBy('Group')->pluck('Group','id')->prepend('Select a Group','');
    return view('content.forms.formCreate' , compact('groupsdropbox'));
   }
   public function PgCreateContactInt( Request  $rqust) {

    $rqust->validate([
            'firstName'=> 'required',
            'lastName' => 'required',
            'email'    => 'required|email',
            'phone'    => 'required',
            'address'  => 'required',
            'idGroup'  => 'required|exists:grops,id'
        ]);
       //dd($rqust->all());
        contact::create($rqust->all());


    return redirect()->route('Contact.home')->with('message','Contact has been add successfully');
   }
   public function showContact($id) {
    $contact =contact::find($id);
     return view('content/showContact',compact('contact'));
   }
   public function ShowEditeContact($id) {
    $groupsdropbox = group::orderBy('Group')->pluck('Group','id')->prepend('','');
    $contact =contact::find($id);
     return view('content.forms._FrmEdite',compact('contact','groupsdropbox'));
   }
   public function SbmtEditeContact($id ,Request  $rqust) {

    $rqust->validate([
        'firstName'=> 'required',
        'lastName' => 'required',
        'email'     => 'required|email',
        'phone'     => 'required',
        'address'   => 'required',
        'idGroup'  => 'required|exists:grops,id'
    ]);
        $contact = contact::find($id);
        $contact->update($rqust->all());
        return redirect()->route('Contact.home')->with('message','Contact has been update successfully');
   }
   public function deletContact($id) {

    $contact = contact::findOrFail($id);
    $contact->delete();

    return redirect()->route('Contact.home')->with('message','Contact has been deleate successfully');

   }

}



