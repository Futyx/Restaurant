<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\Category;
use App\Models\CategoryMenu;
use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Order;
use Darryldecode\Cart\CartCollection;
use Darryldecode\Cart\Facades\Cart;
use DragonCode\Contracts\Cashier\Auth\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = DB::table('menus')->get();
        $userId = auth()->user()->id;
        $categories = DB::table('categories')->get();
        $cartCollection = \Cart::session($userId)->getContent();
        // dd($cartCollection->toArray());
        // $data = request();

        // dd($data->session());


        return view('menu.list', ['menus' => $menus, 'categories' => $categories, 'cartCollection'=>$cartCollection]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addToCart(Request $request)
    {
        
        $menuName = $request->input('menu_name');
        $menuPrice = $request->input('menu_price');

        $menuItem = DB::table('menus')->where('name', $menuName)->first();
        $randomId = rand(10, 90);
        $randomNumber = rand(1, 5);
        $rowId = uniqid($randomId, true);
        $userId = auth()->user()->id;

        $cart = \Cart::session($userId)->add(array(
            'id' => $randomId,
            'name' => $menuItem->name,
            'price' => $menuItem->price,
            'attributes' => array(),
            'quantity' => $randomNumber,
            'associatedModel' => $menuItem
        ));




        $cartCollection = \Cart::getContent();


        // dd($cartCollection->toArray());

        // $newOrder = new Order;
        // $newOrder->user_id = $userId;
        // $newOrder->status = 'new';
        // $totalAmount = 0;

        // foreach ($cartCollection as $item) {
        //     $menu = Menu::find($item->id);
        //     if ($menu) {
        //         $totalAmount += $item->price;
        //         $newOrder->menus()->attach($menu->id);
        //     }
        //     $newOrder->total_amount = $totalAmount;

        //     $newOrder->save();
        // }


        // dd($newOrder->toArray());



        return redirect()->back()->with('success', 'Your form was submitted successfully!');
    }

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
    public function destroy(Request $request)
    {
        if (!\Cart::session(auth()->id())->getContent()->isEmpty()) {
            $cart = \Cart::session(auth()->id())->getContent();
            $auth_id = auth()->id();
        }

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if (isset($cart, $auth_id)) {
            session()->put($auth_id . '_cart', $cart);
        }

        return redirect()->intended(url()->previous());
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        if (session()->get(auth()->id() . '_cart')) {
            $cart = session()->get(auth()->id() . '_cart');
            \Cart::session(auth()->id())->add($cart->toArray());
        }

        return redirect()->intended(url()->previous());
    }
}
