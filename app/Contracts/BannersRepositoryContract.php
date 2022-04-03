<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Banner;
use Illuminate\Database\Eloquent\Builder;

interface BannersRepositoryContract
{
    public function getBanners(int $count): Collection;
}
