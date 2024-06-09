<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; use Illuminate\Database\Eloquent\Factories\HasFactory;
class CashbackOffer extends TranslateAbleModel
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
        'Title' => 'array',
        'description' => 'array',
        'image' => 'string',
        'points' => 'double'
    ];

    public static array $rules = [
        'category_id' => 'required',
        'branch_id' => 'required',
        'Title' => 'required',
        'points' => 'required'
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
