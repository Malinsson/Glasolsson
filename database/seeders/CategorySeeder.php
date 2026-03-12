<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect(['Solglasögon', 'Läsglasögon', 'Progressiva glasögon', 'Barnglasögon', 'Standardglasögon'])
            ->each(function ($name) {
                Category::factory()->create([
                    'name' => $name,
                    'slug' => Str::slug($name)
                ]);
            });
    }
}
