<?php

namespace App\Http\Livewire;

use App\Models\Task;
use App\Models\TaskGroup;
use Carbon\Carbon;
use Livewire\Component;

class CreateTask extends Component
{

    public $title;
    public $description;
    public $due_date;

    public $frequency;
    public $iteration_start_date;
    public $iteration_end_date;
    public $iteration_count;
    public $task_group_id;
    public $task_groups;

    public function mount()
    {
        $this->getTaskGroupsProperty();
    }


    public function create()
    {
        
        $task = new Task();
        $task->title = $this->title;
        $task->description = $this->description;
        $task->due_date = Carbon::createFromFormat('Y-m-d H:i', $this->due_date . ' 00:00');
        $task->frequency = $this->frequency;
        $task->iteration_start_date = Carbon::createFromFormat('Y-m-d H:i', $this->iteration_start_date . ' 00:00');
        $task->iteration_end_date = $this->iteration_end_date ? Carbon::createFromFormat('Y-m-d H:i', $this->iteration_end_date . ' 00:00') : null;
        $task->iteration_count = $this->iteration_count;
        $task->task_group_id = $this->task_group_id;
        $task->save();

        $this->reset();
        $this->getTaskGroupsProperty();
    }

    public function getTaskGroupsProperty()
    {
        $this->task_groups = TaskGroup::orderBy('name', 'asc')->get()->toArray();
    }
    public function render()
    {
        return view('livewire.task.create-task');
    }
}
