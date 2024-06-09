<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; use Illuminate\Database\Eloquent\Factories\HasFactory;
class Company  extends  TranslateAbleModel
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
        'title' => 'array',
        'description' => 'array',
        'image' => 'string',
        'balance' => 'double',
        'provider_id' => 'integer'
    ];

    public static array $rules = [
        'title' => 'required'
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
