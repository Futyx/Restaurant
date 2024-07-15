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

    protected $fillable = [
        'menu_id',
        'status',
        'sub_total'
    ];
    public function menus(){

        return $this->hasMany(Menu::class, 'menu_id');
        
    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
        
    }
    public function customer(){

        return $this->belongsTo(Customer::class,'id', 'customer_id');
        
    }
}
