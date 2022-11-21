<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EducationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'start_date' => $this->faker->date($format= 'Y-m-d', $max = 'now'),
            'end_date' => $this->faker->date($format= 'Y-m-d', $max = 'now'),
            'course' => $this->faker->jobTitle(),
            'institute' => $this->faker->company(),
            'description' => $this->faker->paragraphs($nbSentences = 3, $variableNbSentences = true),
            'grade' => $this->faker->numberBetween($min = 40, $max = 100),
            'total_grade' => 100,
            'created_by' => 1,
        ];
    }
}
