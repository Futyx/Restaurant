<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Darryldecode\Cart\Facades\Cart;


class GuidController extends Controller
{

    public function index()
    {

        // $categories = DB::table('categories')->get();
        // // $menus = DB::table('menus')->get();
        // $find = DB::table('categories')->where('id', 2)->value('title');


        // // $data = DB::table('category_menus')->where('id', 3)->value('menu_id');

        // // $findmenu = DB::table('menus')->find($data);

        // // $menu = DB::table('categorymenus')->pluck('menu_id');
        // $menuname = DB::table('menus')->pluck('name');

        // // Example: Retrieve the roles for a specific user
        // $category = Category::find(2);
        // $menus = $category->menus()->pluck('name');


        // dd($menus);




        // foreach ($titles as $title) {
        //     if()
        //     echo $title . ' ' . ;
        // }


        $menus = DB::table('menus')->get();

        $categories = DB::table('categories')->get();
        

      


        return view('tailwind.guid', ['menus' => $menus, 'categories' => $categories]);
    }

    public function store(Request $request){  


        dd($request->toArray());
        // $item = Menu::find($request->menu_id);  
        // $rowId = 500;  
        // $userId = 1;  
    
        // $cart = \Cart::session($userId)->add(array(  
        //     'id' => $rowId,  
        //     'name' => $item->name,  
        //     'price' => $item->price,  
        //     'quantity' => $request->quantity, 
        //     'attributes' => array(),  
        //     'associatedModel' => $item  
        // ));  
    
        // $cartCollection = \Cart::getContent();  
    
        // dd($cartCollection->toArray()); 
    }
}
