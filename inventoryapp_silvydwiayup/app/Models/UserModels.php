<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UserModels extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'create_At',
        'update_At',
    ];

    protected $casts = [
        'create_At' => 'datetime',
        'update_At' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            $model->Update_At = now();
        });
    }
}