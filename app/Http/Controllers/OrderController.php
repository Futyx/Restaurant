<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = DB::table('orders')->get();
        // foreach($orders as $order){
        //     $menus = Order::find(1)->menus;
        //     foreach($menus as $menu){
        //         dd($menu->name) ;
        //     }

        // }
        // $order = new Order;
        // $order->user_id = 1;
        // $order->save();

        // // $menus = Menu::whereIn('id', [1, 2, 3])->get(); 
        // $order->menus()->attach([1, 2]);

        // dd($order);
        return view('order.list', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
