<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'body', 'price', 'old_price', 'furniture_manufacture_id'];


    public function furnitureManufacture(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(FurnitureManufacture::class, 'id', 'furniture_manufacture_id');
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'furniture_category_id', 'id');
    }

    public function images(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Image::class);
    }

    public function mainImage()
    {
        return $this->belongsToMany(Image::class)->first();
    }
}
