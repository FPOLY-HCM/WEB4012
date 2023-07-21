<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use MarkSitko\LaravelUnsplash\Facades\Unsplash;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::query()->truncate();

        $categories = [
            'Thế giới công nghệ',
            'Sức khỏe và thể hình',
            'Phim ảnh',
            'Gia đình và trẻ em',
            'Thể thao',
            'Nghệ thuật và văn hóa',
            'Lifestyle',
            'Xã hội và văn hóa',
            'Động vật',
            'Công nghệ thông tin',
            'Video games',
        ];

        $images = Unsplash::randomPhoto()
            ->orientation('landscape')
            ->term('people')
            ->randomPhoto()
            ->perPage(100)
            ->count(100)
            ->quantity(1000)
            ->toCollection()
            ->pluck('urls.regular');

        foreach ($categories as $category) {
            Category::query()->create([
                'name' => $category,
                'slug' => Str::slug($category),
                'is_featured' => fake()->boolean(),
                'image' => $images->random(),
                'color' => fake()->hexColor(),
            ]);
        }
    }
}
