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

    public function menus(){

        return $this->belongsToMany(Menu::class, 'menu_order');
        
    }

    public function user(){

        return $this->belongsTo(User::class);
        
    }
    public function customer(){

        return $this->belongsTo(Customer::class);
        
    }
}
