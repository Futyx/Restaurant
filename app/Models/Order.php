<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function menu(){

        return $this->hasMany(Menu::class, 'menu_id');
        
    }

    public function user(){

        return $this->hasOne(User::class, 'user_id');
        
    }
}
