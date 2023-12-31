<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function show(string $slug): View
    {
        $post = Post::query()
            ->where('slug', $slug)
            ->where('status', PostStatus::Published)
            ->with(['category', 'author'])
            ->firstOrFail();

        $relatedPosts = Post::query()
            ->whereBelongsTo($post->category)
            ->where('id', '!=', $post->id)
            ->where('status', PostStatus::Published)
            ->with(['category', 'author'])
            ->limit(4)
            ->get();

        $key = "post_$post->id";

        if (! Session::has($key)) {
            Session::put($key, now()->toDateTimeString());

            $post->increment('views');
        }

        return view('posts.show', compact('post', 'relatedPosts'));
    }
}
