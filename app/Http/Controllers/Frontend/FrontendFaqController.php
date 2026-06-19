<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;

class FrontendFaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::where('status', 1)
            ->orderBy('sort_order')
            ->get();

        return view(
            'frontend.faqs',
            compact('faqs')
        );
    }
}
