<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;
use App\Models\Article;
use App\Models\Banner;

class Image extends Model
{
    use HasFactory;
    public $guarded = ['id'];

    public function furniture()
    {
        return $this->belongsToMany(Furniture::class);
    }

    public function article()
    {
        return $this->belongsToOne(Article::class);
    }

    public function banner()
    {
        return $this->belongsToOne(Banner::class);
    }
}
