<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    protected $fillable = [
        'name',
        'image',
        'price',
        'sale',
        'hot',
        'active',
        'mota',
        'id_danhmuc'
    ];

}
