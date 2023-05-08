<?php

namespace Database\Seeders;

use App\Models\Task;
use Carbon\Carbon;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factory;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Define the categories and their corresponding date ranges
        $categories = [
            'Tasks Today' => [
                'start' => Carbon::today(),
                'end' => Carbon::today(),
            ],
            'Tasks Tomorrow' => [
                'start' => Carbon::tomorrow(),
                'end' => Carbon::tomorrow(),
            ],
            'Tasks Next Week' => [
                'start' => Carbon::now()->startOfWeek()->addDays(7),
                'end' => Carbon::now()->endOfWeek()->addDays(7),
            ],
            'Tasks in the Near Future' => [
                'start' => Carbon::now()->addWeeks(2),
                'end' => Carbon::now()->addWeeks(4),
            ],
            'Tasks in the Future' => [
                'start' => Carbon::now()->addMonths(1),
                'end' => null,
            ],
        ];

        // Seed the database with tasks
        foreach ($categories as $category => $dateRange) {
            $tasks = Task::create([
                'title' => $category . ' Task',
                'task_type' => 'Daily',
                'days_of_week' => null,
                'date_of_month' => null,
                'month_of_year' => null,
                'description' => 'This is a task for ' . $category,
                'iteration_start_date' => $dateRange['start'],
                'iteration_end_date' => $dateRange['end'],
                'iteration_count' => 1,
                'completed' => false,
            ]);


        }
    }
}
