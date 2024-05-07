<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'checkout';
    protected $fillable = [
        'user_id',
        'voucher_id',
        'name',
        'email',
        'address',
        'phone',
        'status',
        'token'
    ];
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function voucher()
    {
        return $this->hasOne(Voucher::class,'id','voucher_id');
    }
    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class,'checkout_id','id');
    }
}
