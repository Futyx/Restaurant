<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryMenu extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
        
    ];

    protected $fillable =[
        'category_id',
        'menu_id',
        'updated_at',
    ];

    public function category(){

        return $this->hasOne(Category::class,'id', 'category_id');
    }

    public function menu(){

        return $this->hasOne(Menu::class,'id', 'menu_id');
    }
}

