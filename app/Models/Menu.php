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

    
    protected $fillable = [
        'slug',
        'name',
        'price'
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

        return $this->belongsToMany(Category::class);
        
    }
    public function orders(){

        return $this->belongsToMany(Order::class);
        
    }
    

 
}

