<?php

namespace Database\Factories\Order;

use App\Models\Order\Subject;
use App\Models\Order\JobCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order\MiniOrder>
 */
class MiniOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->title(),
            'job_category_id' => JobCategory::factory(),
            'subject_id' => Subject::factory(),
            'deadline_date' => $this->faker->dateTime(),
        ];
    }
}
