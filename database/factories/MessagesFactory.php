<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MessagesFactory extends Factory
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
            'email' => $this->faker->unique()->safeEmail(),
            'subject' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'description' => $this->faker->paragraphs($nbSentences = 3, $variableNbSentences = true),
            'created_by' => 1,
        ];
    }
}
