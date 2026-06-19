<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Inquiry;
use App\Models\DealerInquiry;
use App\Models\ContactMessage;
use App\Models\ProductInquiry;
use App\Models\Visitor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();

        $totalCategories = Category::count();

        $totalDealerInquiries = DealerInquiry::count();

        $totalContactMessages = ContactMessage::count();

        $totalProductInquiries = ProductInquiry::count();

        $totalVisitors = Visitor::count();

        $latestProductInquiries = ProductInquiry::with('product')
            ->latest()
            ->take(5)
            ->get();

        $latestDealerInquiries = DealerInquiry::latest()
            ->take(5)
            ->get();

        $latestContactMessages = ContactMessage::latest()
            ->take(5)
            ->get();

        return view(
            'admin.dashboard',
            compact(
                'totalProducts',
                'totalCategories',
                'totalDealerInquiries',
                'totalContactMessages',
                'totalProductInquiries',
                'totalVisitors',
                'latestProductInquiries',
                'latestDealerInquiries',
                'latestContactMessages'
            )
        );
    }
}
