<?php

namespace App\Http\Livewire;

use App\Models\TaskGroup;
use Livewire\Component;

class TaskGroups extends Component
{
    public $task_groups;

    public function mount()
    {
        $this->loadTaskGroups();
    }

    public function loadTaskGroups()
    {
        $this->task_groups = TaskGroup::orderBy('name', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.task-groups');
    }
}
