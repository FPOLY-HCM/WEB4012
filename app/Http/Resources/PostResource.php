<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getKey(),
            'title' => $this->title,
            'content' => $this->content,
            'views' => number_format($this->views ?? 0),
            'thumbnail' => $this->thumbnail,
            'is_featured' => $this->is_featured,
            'likes' => number_format($this->likes ?? 0),
            'created_at' => $this->created_at->diffForHumans(),
            'category' => new CategoryResource($this->whenLoaded('category')),
        ];
    }
}
