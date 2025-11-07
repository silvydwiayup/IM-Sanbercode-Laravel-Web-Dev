<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductModels extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = [
        'categories_id',
        'image',
        'name',
        'description',
        'price',
        'stock',
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

    public function category()
    {
        return $this->belongsTo(CategoriesModels::class, 'categories_id', 'id');
    }


}
