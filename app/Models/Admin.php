<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use SoftDeletes;
    use HasFactory, Notifiable;
    public $table = 'admins';

    public $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'is_active'
    ];

    protected $casts = [
        'email' => 'string',
        'password' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'is_active' => 'integer'
    ];

    public static array $rules = [
        'email' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'password' => 'required'
    ];


}
