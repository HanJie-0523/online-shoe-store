<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name', 'description','price','rating','user_id','image'];//user_id it can change to created by

    // public function wishlist(){
    //     return $this->belongsToMany(User::class, 'wishlists');
    // }
    protected $appends = [
        'quantity_sum',
    ];

    public function categories(){
        return $this->belongsToMany(Category::class, 'category_product');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    // public function orderProduct(){
    //     return $this->hasMany(OrderProduct::class);
    // }

    public function stocks(){
        return $this->hasMany(Stock::class);
    }

    // public function cartProduct(){
    //     return $this->hasMany(CartProduct::class);
    // }
    public function getQuantitySumAttribute(){
        return $this->stocks()->sum('quantity');
    }




}
