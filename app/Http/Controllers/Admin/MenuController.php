<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.menu.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuStoreRequest $request)
    {
        $image = $request->file('image')->store('menus');

        $validate = [
            "name" => $request->name,
            "description" => $request->description,
            "image" => $image,
            "price" => $request->price,
            "category_id" => $request->category
        ];

        Menu::create($validate);
        return to_route('admin.menu.index')->with('success', 'Add Menu Success');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $categories = Category::all();
        return view('admin.menu.edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            "name" => "required",
            "image" => "file|image",
            "description" => "required",
            "price" => "required|integer"
        ]);

        $image = $menu->image;
        if ($request->hasFile('image')) {
            Storage::delete($menu->image);
            $image = $request->file('image')->store('menus');
        }

        $menu->update([
            "name" => $request->name,
            "image" => $image,
            "description" => $request->description,
            "price" => $request->price,
            "category_id" => $request->category
        ]);

        return to_route('admin.menu.index')->with('edit', 'Edit Menu Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if ($menu->image) {
            Storage::delete($menu->image);
        };

        Menu::destroy($menu->id);
        return to_route('admin.menu.index')->with('delete', 'Delete Menu Success');
    }
}