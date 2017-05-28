<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function postMessage(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required'
        ]);
        Mail::to('filip@pacurar.net')
            ->send(new Contact($request->get('name'), $request->get('email'), $request->get('subject'), $request->get('message')));
    }
}
