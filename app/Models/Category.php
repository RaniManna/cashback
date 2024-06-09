<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class Category extends  TranslateAbleModel
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'categories';



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

    /**
     * @return array<string,bool>
     */
    public function getTranslatedFields(): array
    {
        return [
            "title" => true,
            "description" => true
        ];
    }

}
