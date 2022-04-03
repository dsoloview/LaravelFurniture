<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Contracts\HasTags;
use Illuminate\Database\Eloquent\Collection;

interface TagsRepositoryContract
{
    public function createTag($tag): Tag;
    public function getTag(): Collection;
    public function detach(HasTags $model): void;
    public function sync(HasTags $model, array $syncIds): void;
}
