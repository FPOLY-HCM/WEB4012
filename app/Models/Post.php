<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Mail\Markdown;
use Spatie\Tags\HasTags;

class Post extends Model
{
    use HasTags;

    protected $guarded = [];

    protected $casts = [
        'views' => 'int',
        'likes' => 'int',
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

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    protected function contentHtml(): Attribute
    {
        return Attribute::get(fn () => Markdown::parse($this->content));
    }

    protected function readDuration(): Attribute
    {
        return Attribute::get(fn () => ceil(str_word_count($this->content) / 200));
    }
}
