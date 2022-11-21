<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SocialMediasFactory extends Factory
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
            'link' => $this->faker->url(),
            'icon' => $this->faker->imageUrl($width = 640, $height = 480),
            'created_by' => 1,
        ];
    }
}
