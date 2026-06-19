<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductInquiry;

class ProductInquiryManageController extends Controller
{
    public function index()
    {
        $inquiries = ProductInquiry::with('product')
            ->latest()
            ->paginate(20);

        return view(
            'admin.product-inquiries.index',
            compact('inquiries')
        );
    }

    public function show(ProductInquiry $productInquiry)
    {
        return view(
            'admin.product-inquiries.show',
            compact('productInquiry')
        );
    }

    public function destroy(ProductInquiry $productInquiry)
    {
        $productInquiry->delete();

        return back()->with(
            'success',
            'Inquiry Deleted Successfully'
        );
    }
}
