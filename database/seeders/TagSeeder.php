<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        Tag::query()->truncate();

        foreach (range(1, 10) as $ignored) {
            Tag::query()->create([
                'name' => fake('vi')->words(2, true),
                'slug' => fake('vi')->slug(),
            ]);
        }
    }
}
