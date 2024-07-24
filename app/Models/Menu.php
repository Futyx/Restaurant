<?php

namespace App\Models;

use App\Observers\MenuObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


// #[ObservedBy([MenuObserver::class])]
class Menu extends Model
{
    use HasFactory, Sluggable ;

    protected $guarded = [
        'id'
    ];
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

      public function categories(){

        return $this->hasOne(Category::class,'id','category_id' );
        
    }
    public function orders(){

        return $this->belongsToMany(Order::class,'order_id');
        
    }
}

