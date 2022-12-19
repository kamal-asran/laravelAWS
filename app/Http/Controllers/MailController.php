<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailFormRequest;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(MailFormRequest $request)
    {
        $email=$request->email;
        $name=$request->name;
       
        Mail::to($email)->send(new SendEmail(['name'=>$name,'message'=>'welocme to you']));


    }
}
