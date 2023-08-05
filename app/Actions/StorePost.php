<?php

declare(strict_types=1);

namespace App\Actions;

use App\Enums\PostStatus;
use App\Models\Post;
use Illuminate\Support\Str;

class StorePost
{
    public function __invoke(array $data): Post
    {
        return Post::query()->create([
            ...$data,
            'author_id' => request()->user()->getKey(),
            'slug' => Str::slug($data['title']),
            'status' => PostStatus::Published,
        ]);
    }
}
