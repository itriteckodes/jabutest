<?php

namespace Tests\Feature;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreateTaskTest extends TestCase
{
    /**
     * A basic test to create task.
     */
    public function testCreateTask()
    {
        $task = new Task();
        $task->title = 'Sample Task';
        $task->description = 'This is a sample task.';
        $task->task_type = 'Daily';
        $task->days_of_week = json_encode(['Monday', 'Wednesday', 'Friday']);
        $task->date_of_month = 15;
        $task->month_of_year = 'January';
        $task->iteration_start_date = Carbon::parse('2022-01-01');
        $task->iteration_end_date = Carbon::parse('2022-01-31');
        $task->iteration_count = 1;
        $task->task_group_id = 1;
        $task->save();

        $this->assertNotNull($task->id);
        $this->assertEquals('Sample Task', $task->title);

    }
}
