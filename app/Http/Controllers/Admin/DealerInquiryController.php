<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DealerInquiry;

class DealerInquiryController extends Controller
{
    public function index()
    {
        $inquiries = DealerInquiry::latest()->get();

        return view(
            'admin.dealer-inquiries.index',
            compact('inquiries')
        );
    }

    public function show(DealerInquiry $dealerInquiry)
    {
        return view(
            'admin.dealer-inquiries.show',
            compact('dealerInquiry')
        );
    }

    public function destroy(DealerInquiry $dealerInquiry)
    {
        $dealerInquiry->delete();

        return back()->with(
            'success',
            'Inquiry Deleted Successfully'
        );
    }
}
