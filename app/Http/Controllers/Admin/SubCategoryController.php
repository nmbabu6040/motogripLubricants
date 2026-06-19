<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategories = SubCategory::latest()->get();

        return view(
            'admin.sub-categories.index',
            compact('subCategories')
        );
    }

    public function create()
    {
        $categories = Category::where(
            'status',
            1
        )->get();

        return view(
            'admin.sub-categories.create',
            compact('categories')
        );
    }

    public function store(Request $request)
    {

        $slug = Str::slug($request->name);

        $count = SubCategory::where('slug', $slug)->count();

        if ($count > 0) {

            $slug .= '-' . ($count + 1);
        }

        SubCategory::create([

            'category_id' => $request->category_id,

            'name' => $request->name,

            // 'slug' => Str::slug($request->name),

            'slug' => $slug,

            'sort_order' => $request->sort_order,

            'status' => $request->status

        ]);

        return redirect()
            ->route('sub-categories.index')
            ->with(
                'success',
                'Sub Category Added Successfully'
            );
    }

    public function edit(SubCategory $subCategory)
    {
        $categories = Category::all();

        return view(
            'admin.sub-categories.edit',
            compact(
                'subCategory',
                'categories'
            )
        );
    }

    public function update(Request $request, SubCategory $subCategory)
    {

        $slug = Str::slug($request->name);

        $exists = SubCategory::where('slug', $slug)
            ->where('id', '!=', $subCategory->id)
            ->count();

        if ($exists > 0) {

            $slug .= '-' . ($exists + 1);
        }


        $subCategory->update([

            'category_id' => $request->category_id,

            'name' => $request->name,

            'slug' => $slug,

            'sort_order' => $request->sort_order,

            'status' => $request->status

        ]);

        return redirect()
            ->route('sub-categories.index')
            ->with(
                'success',
                'Updated Successfully'
            );
    }

    public function destroy(SubCategory $subCategory)
    {
        if ($subCategory->products()->count() > 0) {

            return back()->with(
                'error',
                'Cannot delete sub category. Products exist under this sub category.'
            );
        }

        $subCategory->delete();

        return back()->with(
            'success',
            'Deleted Successfully'
        );
    }
}
