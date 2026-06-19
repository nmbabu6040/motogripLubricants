<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('sort_order')
            ->latest()
            ->get();

        return view(
            'admin.faqs.index',
            compact('faqs')
        );
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'question' => 'required|max:255',

            'answer' => 'required'
        ]);

        Faq::create([

            'question' => $request->question,

            'answer' => $request->answer,

            'sort_order' => $request->sort_order ?? 0,

            'status' => $request->status ?? 1
        ]);

        return redirect()
            ->route('faqs.index')
            ->with(
                'success',
                'FAQ Created Successfully'
            );
    }

    public function edit(Faq $faq)
    {
        return view(
            'admin.faqs.edit',
            compact('faq')
        );
    }

    public function update(
        Request $request,
        Faq $faq
    ) {
        $request->validate([

            'question' => 'required|max:255',

            'answer' => 'required'
        ]);

        $faq->update([

            'question' => $request->question,

            'answer' => $request->answer,

            'sort_order' => $request->sort_order ?? 0,

            'status' => $request->status ?? 1
        ]);

        return redirect()
            ->route('faqs.index')
            ->with(
                'success',
                'FAQ Updated Successfully'
            );
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return back()
            ->with(
                'success',
                'FAQ Deleted Successfully'
            );
    }
}
