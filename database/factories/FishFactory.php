<?php

namespace Database\Factories;


use App\Models\Fish;
use Illuminate\Database\Eloquent\Factories\Factory;

class FishFactory extends Factory
{
    public function definition(): array
    {

        $species = ['Sapo Perro', 'Cabezón'];
        
        return [
            'name' => $this->faker->company,
            'species' => $species[array_rand($species)],
            'weight' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
