<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MoonshineUser extends Seeder
{
    public function run(): void
    {
        \MoonShine\Models\MoonshineUser::query()->create([
            'email' => 'admin@admin.com',
            'name' => 'Admin',
            'password' => Hash::make('admin@admin.com'),
        ]);
    }
}
