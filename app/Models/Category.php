<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; use Illuminate\Database\Eloquent\Factories\HasFactory;
class Category extends Model
{
     use SoftDeletes;    use HasFactory;    public $table = 'categories';

    public $fillable = [
        'title',
        'description',
        'image'
    ];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'image' => 'string'
    ];

    public static array $rules = [
        'title' => 'required|max:75'
    ];


}
