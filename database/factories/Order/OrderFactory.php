<?php

namespace Database\Factories\Order;

use App\Models\Order\JobCategory;
use App\Models\Order\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order\Order>
 */
class OrderFactory extends Factory
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
            'order_price' => $this->faker->numberBetween(5000000, 999999999),
            'required_orginality' => $this->faker->title(),
            'about_order' => $this->faker->paragraph(5),
            'files' => $this->faker->paragraph(1),
        ];
    }
}
