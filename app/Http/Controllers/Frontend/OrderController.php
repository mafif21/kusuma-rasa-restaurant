<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {

        $menus = Menu::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString();
        return view('order.index', compact('menus'));
    }
}