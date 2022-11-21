<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExperiencesFactory extends Factory
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
            'job_title' => $this->faker->jobTitle(),
            'company_name' => $this->faker->company(),
            'description' => $this->faker->paragraphs($nbSentences = 3, $variableNbSentences = true),
            'created_by' => 1,
        ];
    }
}
