<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompleteTaskTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testMarkAsCompleted(): void
    {
        $task = Task::factory()->create();

        $this->assertFalse($task->completed); // Ensure that the task is initially not completed
        $task->completed = true;
        $task->save();
        $this->assertTrue($task->fresh()->completed ? true : false);
    }
}
