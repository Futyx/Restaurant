<?php

namespace App\Observers;

use App\Models\CategoryMenu;
use App\Models\Menu;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Sluggable;



class MenuObserver
{
    public function creating($request)
    {
        $catmen = new CategoryMenu();

        $catmen->category_id = $request->category_id;
        $catmen->menu_id = $request->id;

        $catmen->save();
    }
}
