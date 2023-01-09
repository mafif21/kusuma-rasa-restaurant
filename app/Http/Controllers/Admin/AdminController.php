<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        // $orders = DB::table('order')->groupBy('user_id');
        // dd($orders);
        // foreach ($orders as $order) {
        //     dd(sum($order->price));
        // }
        return view('admin.index', compact('orders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->update([
            "status" => $request->status
        ]);
        return to_route('admin.index');
    }

    public function destroy(Order $order)
    {
        Order::destroy($order->id);
        return to_route('admin.index');
    }
}