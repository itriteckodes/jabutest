<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Task::class;
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'iteration_start_date' => $this->faker->dateTimeBetween('-2 weeks', '+2 weeks'),
            'iteration_end_date' => $this->faker->dateTimeBetween('+2 weeks', '+6 weeks'),
            'iteration_count' => $this->faker->numberBetween(1, 10),
            'task_type' => $this->faker->randomElement(['daily', 'weekly', 'monthly']),
            'days_of_week' => json_encode($this->faker->randomElements(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'], $count = $this->faker->numberBetween(1, 7))),
            'date_of_month' => $this->faker->numberBetween(1, 31),
            'month_of_year' => $this->faker->randomElement(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']),
            'task_group_id' => $this->faker->numberBetween(1, 5),
            'completed'=> false,
        ];
    }
}
