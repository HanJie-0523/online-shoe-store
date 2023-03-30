<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    use HasFactory;

    protected $fillable = ['cart_id','product_id','quantity','size','color',];

    protected $appends = [
        'price',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function getPriceAttribute(){
        return $this->product->price;
    }
}
