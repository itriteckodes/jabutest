<?php

namespace Tests\Feature;

use App\Models\Task;
use Carbon\Carbon;
use Filament\Notifications\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskListTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_task_list(): void
    {
         // Create some tasks with different due dates
        $todayTask = Task::factory()->create(['iteration_start_date' => Carbon::today()]);
        $tomorrowTask = Task::factory()->create(['iteration_start_date' => Carbon::tomorrow()]);
        $nextWeekTask = Task::factory()->create(['iteration_start_date' => Carbon::now()->startOfWeek()->addDays(7)]);
        $nextMonthTask = Task::factory()->create(['iteration_start_date' => Carbon::now()->addWeeks(2)]);
        $nextYearTask = Task::factory()->create(['iteration_start_date' => Carbon::now()->addMonths(1)]);

        // Modify the todayTask to ensure only one task is due today
        $todayTask->update(['iteration_start_date' => Carbon::tomorrow()->subDay()]);

        // Group the tasks by due date
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();
        $nextWeek = Carbon::now()->startOfWeek()->addDays(7);
        $nextMonth = Carbon::now()->addWeeks(2);
        $nextYear = Carbon::now()->addMonths(1);
        $tasks = Task::all()->groupBy(function ($task) use ($today, $tomorrow, $nextWeek, $nextMonth, $nextYear) {
            $due_date = Carbon::parse($task->iteration_start_date);
            if ($due_date->eq($today)) {
                return 'Tasks Today';
            } elseif ($due_date->eq($tomorrow)) {
                return 'Tasks Tomorrow';
            } elseif ($due_date->gte($nextWeek) && $due_date->lt($nextMonth)) {
                return 'Tasks Next Week';
            } elseif ($due_date->gte($nextMonth)) {
                return 'Tasks in the Near Future';
            } else {
                return 'Tasks in the Future';
            }
        }, $preserveKeys = true);

        $tasks = new Collection($tasks);

        // Assert that the tasks are grouped correctly
        $this->assertTrue($tasks['Tasks Today']->contains($todayTask));

        $this->assertTrue($tasks['Tasks Tomorrow']->contains($tomorrowTask));

        $this->assertTrue($tasks['Tasks Next Week']->contains($nextWeekTask));
    }

}
