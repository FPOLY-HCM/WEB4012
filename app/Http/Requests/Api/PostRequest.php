<?php

declare(strict_types=1);

namespace App\Http\Requests\Api;

use App\Models\Category;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'string', Rule::exists(Category::class, 'id')],
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('posts')
                    ->ignore($this->route('post'))
                    ->where(function (Builder $query): Builder {
                        return $query->where('author_id', $this->user()->getKey());
                    }),
            ],
            'content' => ['required', 'string', 'min:20'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'is_featured' => ['nullable', 'boolean'],
        ];
    }
}
