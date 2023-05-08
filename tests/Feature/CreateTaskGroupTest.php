<?php

namespace Tests\Feature;

use App\Models\TaskGroup;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTaskGroupTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $task_group = new TaskGroup();
        $task_group->name = 'Sample Task Group';
        $task_group->description = 'This is a sample task group.';
        $task_group->save();

        $this->assertNotNull($task_group->id);
        $this->assertEquals('Sample Task Group', $task_group->name);
        $this->assertEquals('This is a sample task group.', $task_group->description);
    }
}
