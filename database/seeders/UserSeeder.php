<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->truncate();

        User::query()->create([
            'name' => 'Ngo Quoc Dat',
            'email' => 'datnqpd05994@fpt.edu.vn',
            'email_verified_at' => now(),
            'password' => '123456',
        ]);
    }
}
