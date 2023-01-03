<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::content();
        return view('cart.index', compact('carts'));
    }

    public function store(Request $request)
    {
        $data = Menu::where('slug', $request->slug)->get()->first();
        Cart::add($data->slug, $data->name, 1, $data->price);

        return to_route('food.index');
    }
}