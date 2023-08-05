<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Post;
use Illuminate\Support\Str;

class UpdatePost
{
    public function __invoke(Post $post, array $data): bool
    {
        return $post->update([
            ...$data,
            'slug' => Str::slug($data['title']),
        ]);
    }
}
