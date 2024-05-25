<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; use Illuminate\Database\Eloquent\Factories\HasFactory;
class CashbackCoupon extends Model
{
     use SoftDeletes;    use HasFactory;    public $table = 'cashback_coupons';

    public $fillable = [
        'title',
        'category_id',
        'branch_id',
        'cashback_percentage',
        'cashback_percentage_sys'
    ];

    protected $casts = [
        'title' => 'string',
        'category_id' => 'integer',
        'branch_id' => 'integer',
        'cashback_percentage' => 'double',
        'cashback_percentage_sys' => 'double'
    ];

    public static array $rules = [
        'title' => 'required',
        'category_id' => 'required',
        'branch_id' => 'required',
        'cashback_percentage' => 'required',
        'cashback_percentage_sys' => 'required'
    ];

    
}
