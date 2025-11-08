<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionModels extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'products_id',
        'users_id',
        'type',
        'amount',
        'notes',
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

    public function products()
    {
        return $this->belongsTo(ProductModels::class, 'products_id');
    }

    public function users()
    {
        return $this->belongsTo(UserModels::class, 'users_id');
    }

}
