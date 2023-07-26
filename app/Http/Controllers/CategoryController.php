<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    public function show(string $slug): View
    {
        $category = Category::query()
            ->where('slug', $slug)
            ->with('posts')
            ->withCount('posts')
            ->firstOrFail();

        $posts = $category->posts()->paginate(5);

        return view('categories.show', compact('category', 'posts'));
    }
}
