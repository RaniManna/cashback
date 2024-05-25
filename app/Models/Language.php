<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; use Illuminate\Database\Eloquent\Factories\HasFactory;
class Language extends Model
{
     use SoftDeletes;    use HasFactory;    public $table = 'languages';

    public $fillable = [
        'Title',
        'code'
    ];

    protected $casts = [
        'Title' => 'string',
        'code' => 'string'
    ];

    public static array $rules = [
        'Title' => 'required',
        'code' => 'required'
    ];

    
}
