<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Banner extends Model
{
    use HasFactory;

    public function image()
    {
        return $this->HasOne(Image::class, 'id', 'image_id');
    }
}
