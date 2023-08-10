<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum PostStatus: string implements HasLabel, HasColor
{
    case Pending = 'pending';

    case Draft = 'draft';

    case Published = 'published';

    case Archived = 'archived';

    public function getLabel(): string|null
    {
        return match ($this) {
            self::Pending => 'Đang chờ',
            self::Draft => 'Bản nháp',
            self::Published => 'Công khai',
            self::Archived => 'Lưu trữ',
        };
    }

    public function getColor(): string|null
    {
        return match ($this) {
            self::Pending => 'gray',
            self::Draft => 'gray',
            self::Published => 'success',
            self::Archived => 'danger',
        };
    }
}
