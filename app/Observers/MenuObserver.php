<?php

namespace App\Observers;

use App\Models\Menu;
use Illuminate\Support\Str;


class MenuObserver
{
    public function creating(Menu $menu){

        $menu->slug = Str::slug($menu->name);
    }
}
