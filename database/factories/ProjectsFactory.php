<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectsFactory extends Factory
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
            'category_id' => rand(1,2),
            'link' => $this->faker->url(),
            'description' => $this->faker->paragraphs($nbSentences = 3, $variableNbSentences = true),
            'created_by' => 1,
        ];
    }
}
