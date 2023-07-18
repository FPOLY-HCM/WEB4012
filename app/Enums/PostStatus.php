<?php

declare(strict_types=1);

namespace App\Enums;

enum PostStatus: string
{
    case Pending = 'pending';

    case Draft = 'draft';

    case Published = 'published';

    case Archived = 'archived';
}
