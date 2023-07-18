<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_featured' => 'bool',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
