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

        return $this->belongsToMany(Menu::class);
        
    }

    public function user(){

        return $this->belongsTo(User::class);
        
    }
    public function customer(){

        return $this->belongsTo(Customer::class);
        
    }
}
