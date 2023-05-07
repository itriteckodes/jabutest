<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Livewire\Component;

class PendingTasks extends Component
{
    public $tasks = [];

    public function mount()
    {
        $this->loadTasks();
    }

    public function loadTasks()
    {
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();
        $nextWeek = Carbon::now()->addWeek();
        $nextMonth = Carbon::now()->addMonth();
        $nextYear = Carbon::now()->addYear();

        $this->tasks = Task::where('completed', false)
            ->orderBy('due_date', 'asc')
            ->get()
            ->groupBy(function ($task) use ($today, $tomorrow, $nextWeek, $nextMonth, $nextYear) {
                $due_date = Carbon::createFromFormat('Y-m-d H:i:s', $task->due_date);

                if ($due_date->eq($today)) {
                    return 'Tasks Today';
                } elseif ($due_date->eq($tomorrow)) {
                    return 'Tasks Tomorrow';
                } elseif ($due_date->gte($nextWeek) && $due_date->lt($nextMonth)) {
                    return 'Tasks Next Week';
                } elseif ($due_date->gte($nextMonth) && $due_date->lt($nextYear)) {
                    return 'Tasks in the Near Future';
                } else {
                    return 'Tasks in the Future';
                }
            }, $preserveKeys = true);

        $this->tasks = new Collection($this->tasks);

    }

    public function markAsCompleted($id)
    {
        $task = Task::find($id);
        $task->completed = true;
        $task->save();

        $this->loadTasks();
    }

    public function render()
    {
        return view('livewire.pending-tasks');
    }
}
