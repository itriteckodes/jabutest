<?php

namespace App\Http\Livewire;

use App\Models\TaskGroup;
use Livewire\Component;
use WireUi\Traits\Actions;

class CreateTaskGroup extends Component
{
    use Actions;
    public $name;
    public $description;


    public function create()
    {
        $rules = [
            'name' => 'required|string|max:255',
        ];

        $this->validate($rules, []);

        $task_group = new TaskGroup();
        $task_group->name = $this->name;
        $task_group->description = $this->description;
        $task_group->save();

        $this->reset();
        $this->notification()->success(
            title: 'Task Group created successfully',
            description: 'Your task group has created successfully'
        );
    }

    public function render()
    {
        return view('livewire.task-group.create-task-group');
    }
}
