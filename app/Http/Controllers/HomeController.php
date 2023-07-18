<?php

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request): View
    {
        $posts = Post::query()
            ->where('status', PostStatus::Published)
            ->with(['category', 'author', 'tags'])
            ->get();

        $categories = Category::query()
            ->where('is_featured', true)
            ->withCount('posts')
            ->get();

        return view('home', compact('posts', 'categories'));
    }
}
