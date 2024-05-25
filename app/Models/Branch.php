<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; use Illuminate\Database\Eloquent\Factories\HasFactory;
class Branch extends Model
{
     use SoftDeletes;    use HasFactory;    public $table = 'branches';

    public $fillable = [
        'title',
        'lat',
        'lan',
        'company_id',
        'address'
    ];

    protected $casts = [
        'title' => 'string',
        'lat' => 'string',
        'lan' => 'string',
        'company_id' => 'integer',
        'address' => 'string'
    ];

    public static array $rules = [
        'lat' => 'required',
        'lan' => 'required'
    ];

    
}
