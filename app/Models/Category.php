<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory;
    use NodeTrait;

    protected $guarded = [];

    public function furniture()
    {
        return $this->hasMany(Furniture::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
