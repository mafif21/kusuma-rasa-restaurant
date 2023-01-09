<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::content();

        // dd($carts);
        return view('cart.index', compact('carts'));
    }


    public function update(Request $request, $key)
    {
        Cart::update($key, array(
            'qty' => $request->qty,
        ));

        return to_route('cart.index');
    }

    public function destroy($id)
    {
        Cart::remove($id);
        return to_route('cart.index');
    }
}