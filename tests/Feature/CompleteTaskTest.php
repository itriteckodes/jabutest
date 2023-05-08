<?php

namespace Tests\Feature;

use App\Http\Livewire\PendingTasks;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompleteTaskTest extends TestCase
{
    public function testCompleteTask()
    {
        $task = Task::factory()->create();

        // Create a PendingTasks component instance
        $component = new PendingTasks();

        // Call the completeTask method
        $component->markAsCompleted($task->id);

        // Assert that the task is marked as completed
        $this->assertTrue($task->fresh()->completed);
    }
}
