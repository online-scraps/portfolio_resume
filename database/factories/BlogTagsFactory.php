<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogTagsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'description' => $this->faker->paragraphs($nbSentences = 3, $variableNbSentences = true),
            'meta_title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'meta_description' => $this->faker->paragraphs($nbSentences = 3, $variableNbSentences = true),
            'meta_keyword' => $this->faker->paragraphs($nbSentences = 3, $variableNbSentences = true),
            'created_by' => 1,
        ];
    }
}
