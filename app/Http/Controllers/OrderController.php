<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Darryldecode\Cart\Facades\Cart;
use Illuminate\Support\Facades\Log;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $userId = auth()->user()->id;

        $cartItems = \Cart::session($userId)->getContent();


        $newOrder = new Order;
        $newOrder->user_id = $userId;
        $newOrder->status = 'new';
        $totalAmount = 0;

        $newOrder->save();

        foreach ($cartItems as $item) {
            $menuNames =$cartItems->pluck('name')->all();

             $menus = Menu::whereIn('name', $menuNames)->get();
           
                $totalAmount += $item->price * $item->quantity;
                $newOrder->menus()->attach($menus);

        }


        $newOrder->total_amount = $totalAmount;

        $newOrder->save();

        // dd($cartItems->toArray());


        // dd($newOrder->menus->toArray());



        // foreach ($cartItems as $item) {

        //     }
        //     $newOrder->total_amount = $totalAmount;

        // }


        // dd($newOrder->toArray());

        return view('order.list', compact('cartItems'));
    }

    public function allOrders()
    {
        $orders = Order::all();

        return view('orders.all', compact('orders'));
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
     
        

        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
