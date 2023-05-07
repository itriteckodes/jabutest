<?php

namespace App\Http\Livewire;

use App\Models\TaskGroup;
use Livewire\Component;

class CreateTaskGroup extends Component
{
    public $name;
    public $description;

    public function create()
    {
        $task_group = new TaskGroup();
        $task_group->name = $this->name;
        $task_group->description = $this->description;
        $task_group->save();
        session()->flash('message', 'Task Group successfully created.');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.task-group.create-task-group');
    }
}