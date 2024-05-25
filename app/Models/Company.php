<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; use Illuminate\Database\Eloquent\Factories\HasFactory;
class Company extends Model
{
     use SoftDeletes;    use HasFactory;    public $table = 'companies';

    public $fillable = [
        'title',
        'description',
        'image',
        'balance',
        'provider_id'
    ];

    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'image' => 'string',
        'balance' => 'double',
        'provider_id' => 'integer'
    ];

    public static array $rules = [
        'title' => 'required'
    ];

    
}
