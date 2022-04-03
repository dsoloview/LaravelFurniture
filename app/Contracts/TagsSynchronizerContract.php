<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Contracts\HasTags;
use Illuminate\Database\Eloquent\Collection;

interface TagsSynchronizerContract
{
    public function sync(Collection $tags, HasTags $model): void;
}
