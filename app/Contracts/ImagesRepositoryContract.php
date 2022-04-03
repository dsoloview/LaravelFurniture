<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Image;
use Illuminate\Database\Eloquent\Builder;

interface ImagesRepositoryContract
{
    public function create($image): Image;
}
