<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FurnitureManufacture extends Model
{
    use HasFactory;

    public function furniture()
    {
        return $this->hasMany(Furniture::class, 'furniture_manufacture_id', 'id');
    }
}
