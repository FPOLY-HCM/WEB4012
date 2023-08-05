<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Người dùng', User::query()->count()),
            Stat::make('Danh mục', Category::query()->count()),
            Stat::make('Bài viết', Post::query()->count()),
        ];
    }
}
