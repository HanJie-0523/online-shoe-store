<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id',];

    protected $appends = [
        'price_sum',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    //the product inside the cart, it is not a pivot table
    public function cartProducts(){
        return $this->hasMany(CartProduct::class);
    }

    public function getPriceSumAttribute(){
        return $this->cartProducts->sum('price');
    }


}
