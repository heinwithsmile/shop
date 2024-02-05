<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $photos = [
        //     'storage/frontend/images/sofa.png',
        //     'storage/frontend/images/bed.png',
        //     'storage/frontend/images/chair.png',
        //     'storage/frontend/images/lamp.png',
        //     'storage/frontend/images/table.png'
        // ];
        
        return [
            'product_id' => $this->faker->uuid,
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph(),
            // 'photo' => $this->faker->randomElement($photos),
            'price' => $this->faker->randomNumber(2)
        ];
    }
}
