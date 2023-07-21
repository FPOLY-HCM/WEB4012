<?php

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request): View
    {
        $posts = Post::query()
            ->where('status', PostStatus::Published)
            ->with(['category', 'author', 'tags'])
            ->latest()
            ->get();

        $recentPosts =  $posts->sortByDesc('created_at')->take(9);
        $popularPosts = $posts->where('is_featured', true)->take(4);

        $categories = Category::query()
            ->where('is_featured', true)
            ->withCount('posts')
            ->get();

        $tags = Tag::query()
            ->withCount('posts')
            ->get();

        return view('home', compact('posts', 'recentPosts', 'popularPosts', 'categories', 'tags'));
    }
}
