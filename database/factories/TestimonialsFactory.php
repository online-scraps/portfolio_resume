<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'rating' => $this->faker->numberBetween($min = 1, $max = 5),
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'created_by' => 1,
        ];
    }
}
