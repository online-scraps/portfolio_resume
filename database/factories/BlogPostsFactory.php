<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostsFactory extends Factory
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
            'publish_date' => $this->faker->date($format= 'Y-m-d', $max = 'now'),
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'meta_title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'meta_description' => $this->faker->paragraphs($nbSentences = 3, $variableNbSentences = true),
            'meta_keyword' => $this->faker->paragraphs($nbSentences = 3, $variableNbSentences = true),
            'created_by' => 1,
            'category_id' => $this->faker->numberBetween($min = 1, $max = 5),
        ];
    }
}
