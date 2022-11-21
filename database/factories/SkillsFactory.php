<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SkillsFactory extends Factory
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
            'percentage' => $this->faker->numberBetween($min = 1, $max = 100),
            'skill_type_id' => rand(1,2),
            'description' => $this->faker->paragraphs($nbSentences = 3, $variableNbSentences = true),
            'created_by' => 1,
        ];
    }
}
