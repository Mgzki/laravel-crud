<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{
    public function index(){
        return view('contact');
    }
    
    public function store() 
    {
        Mail::send('contact-message', [
            'msg' => request('message'),
        ], function ($mail) {
            $mail->from(request('email'), request('name'));
            $mail->to('panther79813@hotmail.com');
        });

        return redirect()->back()->withSuccess('Thanks for your email!');
    }
}
