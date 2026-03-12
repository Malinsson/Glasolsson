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
            'Rosa',
            'Grå'
        ];

        $materials = [
            'Acetat',
            'Metall',
            'Plast',
            'Rostfritt stål',
            'TR90',
            'Titan',
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

        $stockImages = [
            'images/stock/stock1.avif',
            'images/stock/stock2.avif',
            'images/stock/stock3.avif',
            'images/stock/stock4.avif',
            'images/stock/stock5.avif',
            'images/stock/stock6.avif',
        ];

        foreach (range(1, 40) as $index) {
            Product::factory()->create([
                'name' => fake()->randomElement($names) . ' ' . fake()->unique()->numberBetween(100, 999),
                'color' => fake()->randomElement($colors),
                'material' => fake()->randomElement($materials),
                'description' => fake()->randomElement($descriptions),
                'price' => fake()->randomFloat(2, 799, 3999),
                'category_id' => Category::inRandomOrder()->first()->id,
                'image' => fake()->randomElement($stockImages),
            ]);
        }
    }
}
