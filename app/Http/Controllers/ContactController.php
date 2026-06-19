<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        return view(
            'frontend.contact',
            compact('setting')
        );
    }

    public function store(Request $request)
    {
        ContactMessage::create([

            'name' => $request->name,

            'phone' => $request->phone,

            'email' => $request->email,

            'subject' => $request->subject,

            'message' => $request->message

        ]);


        Mail::raw(

            "New Contact Message\n\n" .
                "Name: " . $request->name . "\n" .
                "Phone: " . $request->phone . "\n" .
                "Email: " . $request->email . "\n" .
                "Subject: " . $request->subject . "\n" .
                "Message: " . $request->message,

            function ($message) {

                $message->to(env('MAIL_FROM_ADDRESS'))
                    ->subject('New Contact Message');
            }
        );

        return back()->with(
            'success',
            'Message Sent Successfully'
        );
    }
}
