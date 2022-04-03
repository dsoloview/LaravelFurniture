<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface BaseRepositoryContract
{
    public function all();
    public function paginate($count): LengthAwarePaginator;
}
