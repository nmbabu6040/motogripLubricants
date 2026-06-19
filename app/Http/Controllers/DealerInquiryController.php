<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\DealerInquiry;

class DealerInquiryController extends Controller
{
    public function create()
    {
        return view(
            'frontend.dealer-inquiry'
        );
    }

    public function store(Request $request)
    {
        DealerInquiry::create([

            'name' => $request->name,

            'company' => $request->company,

            'phone' => $request->phone,

            'email' => $request->email,

            'city' => $request->city,

            'message' => $request->message

        ]);

        Mail::raw(

            "New Dealer Inquiry\n\n" .
                "Name: " . $request->name . "\n" .
                "Company: " . $request->company . "\n" .
                "Phone: " . $request->phone . "\n" .
                "Email: " . $request->email . "\n" .
                "City: " . $request->city . "\n" .
                "Message: " . $request->message,

            function ($message) {

                $message->to(env('MAIL_FROM_ADDRESS'))
                    ->subject('New Dealer Inquiry');
            }
        );

        return back()->with(
            'success',
            'Inquiry Submitted Successfully'
        );
    }
}
