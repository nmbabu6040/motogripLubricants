<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName = time() . '.' . $request->image->extension();

            $request->image->storeAs(
                'categories',
                $imageName,
                'public'
            );
        }

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $imageName,
            'sort_order' => $request->sort_order,
            'status' => $request->status ?? 1,
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category Created Successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $imageName = $category->image;

        if ($request->hasFile('image')) {

            $imageName = time() . '.' . $request->image->extension();

            $request->image->storeAs(
                'categories',
                $imageName,
                'public'
            );
        }

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $imageName,
            'sort_order' => $request->sort_order,
            'status' => $request->status
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Updated Successfully');
    }

    public function destroy(Category $category)
    {
        if ($category->products()->count() > 0) {

            return back()->with(
                'error',
                'Cannot delete category. Products exist under this category.'
            );
        }

        if ($category->subCategories()->count() > 0) {

            return back()->with(
                'error',
                'Cannot delete category. Sub Categories exist under this category.'
            );
        }

        $category->delete();

        return back()->with(
            'success',
            'Deleted Successfully'
        );
    }
}
