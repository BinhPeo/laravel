<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $appends='price';
    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];
    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
    public function getPriceAttribute()
    {
        return $this->product->sale ? $this->product->sale : $this->product->price;
    }
}
