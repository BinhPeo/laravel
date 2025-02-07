<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'user_id',
        'product_id',
        'commet',
        'rating'
    ];
    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
