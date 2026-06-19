<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('sort_order')->get();

        return view(
            'admin.menus.index',
            compact('menus')
        );
    }

    public function create()
    {
        $parentMenus = Menu::whereNull('parent_id')
            ->orderBy('sort_order')
            ->get();

        return view(
            'admin.menus.create',
            compact('parentMenus')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required',
            'url' => 'required',

        ]);

        Menu::create([

            'title' => $request->title,

            'url' => $request->url,

            'parent_id' => $request->parent_id,

            'sort_order' => $request->sort_order,

            'status' => $request->status ?? 0

        ]);

        return redirect()
            ->route('menus.index')
            ->with('success', 'Menu Created');
    }

    public function edit(Menu $menu)
    {
        $parentMenus = Menu::whereNull('parent_id')
            ->where('id', '!=', $menu->id)
            ->orderBy('sort_order')
            ->get();

        return view(
            'admin.menus.edit',
            compact(
                'menu',
                'parentMenus'
            )
        );
    }

    public function update(Request $request, Menu $menu)
    {
        $menu->update([

            'title' => $request->title,

            'url' => $request->url,

            'parent_id' => $request->parent_id,

            'sort_order' => $request->sort_order,

            'status' => $request->status ?? 0

        ]);

        return redirect()
            ->route('menus.index')
            ->with('success', 'Menu Updated');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return back()
            ->with('success', 'Menu Deleted');
    }
}
