<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Website;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        Website::create([
            'name' => 'Inisev',
            'url' => 'https://inisev.com',
        ]);

        Website::create([
            'name' => 'Laravel Daily',
            'url' => 'https://laraveldaily.com',
        ]);

        Website::create([
            'name' => 'Laravel News',
            'url' => 'https://laravel-news.com',
        ]);
    }
}
