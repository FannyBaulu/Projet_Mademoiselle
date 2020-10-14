<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    
    public function store(Request $request){

        $data= request()->validate([
            'name'=> 'required',
            'email' => 'required',
            'subject'=>'required',
            'message'=>'required'
        ]);
        Mail::to('superadmin@admin.com')->send(new ContactMail($data));
        $request->session()->flash('success','Your message has been sent successfully.');
        return redirect()->route('home.index');
    }
}
