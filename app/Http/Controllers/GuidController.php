<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class GuidController extends Controller
{

    public function index()
    {
        $menus = Menu::all();
        $categories = Category::all();
        return view('tailwind.guid', ['menus'=> $menus, 'categories'=>$categories]);
    }
}
