<?php

namespace Tests\Feature;

use App\Http\Livewire\PendingTasks;
use App\Models\Task;
use Carbon\Carbon;
use Filament\Notifications\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskListTest extends TestCase
{
    public function test_task_list()
{
    // Create some tasks with different due dates
    $todayTask = Task::factory()->create(['iteration_start_date' => Carbon::today()]);
    $tomorrowTask = Task::factory()->create(['iteration_start_date' => Carbon::tomorrow()]);
    $nextWeekTask = Task::factory()->create(['iteration_start_date' => Carbon::now()->startOfWeek()->addDays(7)]);
    $nextMonthTask = Task::factory()->create(['iteration_start_date' => Carbon::now()->addWeeks(2)]);
    $nextYearTask = Task::factory()->create(['iteration_start_date' => Carbon::now()->addMonths(1)]);

    // Modify the todayTask to ensure only one task is due today
    $todayTask->update(['iteration_start_date' => Carbon::tomorrow()->subDay()]);

    // Create a TaskList component instance
    $component = new PendingTasks();

    $component->loadTasks();
    $tasks = $component->tasks;

    // Assert that the tasks are grouped correctly
    $this->assertTrue($tasks['Tasks Today']->contains($todayTask));
}
}
