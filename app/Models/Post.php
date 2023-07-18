<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Tags\HasTags;

class Post extends Model
{
    use HasTags;

    protected $guarded = [];

    protected $casts = [
        'views' => 'int',
        'is_featured' => 'bool',
        'status' => PostStatus::class,
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
