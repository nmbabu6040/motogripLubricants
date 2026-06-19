<?php

namespace App\Http\Controllers;

use App\Models\ProductInquiry;
use Illuminate\Support\Facades\Mail;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductInquiryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([

            'product_id' => 'required',

            'name' => 'required|max:255',

            'phone' => 'required|max:50',

            'email' => 'nullable|email',

            'message' => 'nullable'

        ]);

        ProductInquiry::create([

            'product_id' => $request->product_id,

            'name' => $request->name,

            'phone' => $request->phone,

            'email' => $request->email,

            'message' => $request->message,

        ]);

        $product = Product::find($request->product_id);

        Mail::raw(

            "New Product Inquiry\n\n" .
                "Product: " . ($product->name ?? 'N/A') . "\n" .
                "Name: " . $request->name . "\n" .
                "Phone: " . $request->phone . "\n" .
                "Email: " . $request->email . "\n" .
                "Message: " . $request->message,

            function ($message) use ($product) {

                $message->to(env('MAIL_FROM_ADDRESS'))
                    ->subject(
                        'New Product Inquiry - ' .
                            ($product->name ?? 'Product')
                    );
            }
        );

        return back()->with(
            'success',
            'Your inquiry has been submitted successfully.'
        );
    }
}
