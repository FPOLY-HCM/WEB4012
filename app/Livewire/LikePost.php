<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class LikePost extends Component
{
    public Post $post;

    public function mount(Post $post): void
    {
        $this->post = $post;
    }

    public function like(): void
    {
        $this->post->increment('likes');
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
