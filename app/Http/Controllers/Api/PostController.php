<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Actions\StorePost;
use App\Actions\UpdatePost;
use App\Enums\PostStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostController extends Controller
{
    public function index(): ResourceCollection
    {
        $posts = Post::query()
            ->where('status', PostStatus::Published)
            ->with(['author', 'category'])
            ->paginate();

        return PostResource::collection($posts);
    }

    public function store(PostRequest $request, StorePost $storePost): PostResource
    {
        $post = $storePost($request->validated());

        return new PostResource($post);
    }

    public function show(Post $post): PostResource
    {
        return new PostResource($post);
    }

    public function update(PostRequest $request, Post $post, UpdatePost $updatePost): PostResource
    {
        $updatePost($post, $request->validated());

        $post->refresh();

        return new PostResource($post);
    }

    public function destroy(Post $post): JsonResponse
    {
        $post->delete();

        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }
}
