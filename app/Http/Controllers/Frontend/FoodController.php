<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{
    public function index()
    {
        $menus = Menu::latest()->filter(request(['search', 'category', 'author']))->get();
        return view('foods.index', compact('menus'));
    }

    public function show($slug)
    {
        $food = Menu::where('slug', $slug)->get()->first();
        return view('foods.detail', compact('food'));
    }
}