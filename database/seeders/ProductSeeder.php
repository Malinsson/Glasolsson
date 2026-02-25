<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'Aviator Classic',
            'Wayfarer Bold',
            'Round Vintage',
            'Cat Eye Elegance',
            'Rectangular Modern',
            'Clubmaster Retro',
            'Oversized Glamour',
            'Sport Active',
            'Slim Profile',
            'Square Edge'
        ];

        $colors = [
            'Svart',
            'Tortoise',
            'Blå',
            'Guld',
            'Silver',
            'Röd',
            'Transparent',
            'Grön',
            'Brun',
            'Rosa'
        ];

        $materials = [
            'Acetat',
            'Metall',
            'Titan',
            'Rostfritt stål',
            'TR90',
            'Trä',
            'Aluminium',
            'Bambu'
        ];

        $descriptions = [
            'Klassisk design med modern passform för dagligt bruk.',
            'Elegant ram med hållbart material och bekväm passform.',
            'Tidlös stil som passar alla ansiktsformer.',
            'Lätt och flexibel ram för maximal komfort.',
            'Premium kvalitet med exklusiv finish.',
            'Sportig design för aktiva livsstilar.',
            'Minimalistisk elegans för moderna kunder.',
            'Robust konstruktion med sofistikerad look.'
        ];

        foreach (range(1, 20) as $index) {
            Product::factory()->create([
                'name' => fake()->randomElement($names) . ' ' . fake()->unique()->numberBetween(100, 999),
                'color' => fake()->randomElement($colors),
                'material' => fake()->randomElement($materials),
                'description' => fake()->randomElement($descriptions),
                'price' => fake()->randomFloat(2, 799, 3999),
                'category_id' => Category::inRandomOrder()->first()->id,
            ]);
        }
    }
}
