<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; use Illuminate\Database\Eloquent\Factories\HasFactory;
class CashbackOffer extends Model
{
     use SoftDeletes;    use HasFactory;    public $table = 'cashback_offers';

    public $fillable = [
        'category_id',
        'branch_id',
        'Title',
        'description',
        'image',
        'points'
    ];

    protected $casts = [
        'category_id' => 'integer',
        'branch_id' => 'integer',
        'Title' => 'string',
        'description' => 'string',
        'image' => 'string',
        'points' => 'double'
    ];

    public static array $rules = [
        'category_id' => 'required',
        'branch_id' => 'required',
        'Title' => 'required',
        'points' => 'required'
    ];

    
}
