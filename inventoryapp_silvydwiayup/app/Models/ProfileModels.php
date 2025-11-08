<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfileModels extends Model
{
    use HasFactory; 
    
    protected $table = 'profile';
    protected $primaryKey = 'id';

    protected $fillable = [
        'users_id',
        'age',
        'bio',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model){
            $model->created_at = now();
            $model->updated_at = now();

        });

        static::updating(function ($model) {
            $model->updated_at = now();
        });
    }

    public function users()
    {
        return $this->belongsTo(UserModels::class, 'users_id', 'id');
    }
}
