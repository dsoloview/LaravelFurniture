<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Contracts\HasTags;
use App\Models\Tag;
use App\Contracts\TagsRepositoryContract;
use App\Contracts\TagsSynchronizerContract;

/**
 *
 */
class TagsSynchronizer implements TagsSynchronizerContract
{
    private $tagsRepository;

    public function __construct(TagsRepositoryContract $tagsRepository)
    {
        $this->tagsRepository = $tagsRepository;
    }
    public function sync(Collection $tags, HasTags $model): void
    {
        foreach ($tags as $tag) {
            $tag = trim($tag);
            if (!empty($tag) || $tag === '0') {
                $tag = $this->tagsRepository->createTag($tag);
                $syncIds[] = $tag->id;
            }
        }
        if (empty($syncIds)) {
            $this->tagsRepository->detach($model);
        } else {
            $this->tagsRepository->sync($model, $syncIds);
        }
    }
}
