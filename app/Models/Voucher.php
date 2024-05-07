<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $table = 'voucher';
    protected $fillable =
    [
        'voucher_name',
        'voucher_so',
        'voucher_tinhtrang',
        'voucher_time',
        'voucher_coder',
    ];
}
