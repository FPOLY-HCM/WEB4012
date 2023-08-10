<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(string $slug, Request $request): View
    {
        $category = Category::query()
            ->where('slug', $slug)
            ->firstOrFail();

        $posts = Post::query()
            ->whereBelongsTo($category)
            ->when($request->has('q'), function (Builder $query) use ($request) {
                $query->where('title', 'like', '%' . $request->get('q') . '%');
            })
            ->with('category')
            ->latest()
            ->paginate(10);

        return view('categories.show', compact('category', 'posts'));
    }
}
