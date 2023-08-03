<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Mail\UserVerified;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Mail;

class SendMailVerifiedNotification
{
    public function __construct()
    {
    }

    public function handle(Verified $event): void
    {
        Mail::to($event->user)->send(new UserVerified($event->user));
    }
}
