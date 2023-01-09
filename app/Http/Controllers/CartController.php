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

    public function addCart(Request $request)
    {
        $data = Menu::where('slug', $request->slug)->get()->first();
        Cart::add($data->slug, $data->name, 1, $data->price, 0);

        return to_route('food.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'qty' => 'required|integer',
            'price' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['status'] = false;


        Order::create($validatedData);
        return to_route('cart.index')->with('success', 'Order Successs');
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