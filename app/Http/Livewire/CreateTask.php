<?php

namespace App\Http\Livewire;

use App\Models\Task;
use App\Models\TaskGroup;
use Carbon\Carbon;
use Livewire\Component;
use WireUi\Traits\Actions;

class CreateTask extends Component
{
    use Actions;
    public $frequencies = [
        ['id' => 'daily', 'text' => 'Daily'],
        ['id' => 'weekly', 'text' => 'Weekly'],
        ['id' => 'monthly', 'text' => 'Monthly'],
        ['id' => 'yearly', 'text' => 'Yearly'],
    ];
    public $daysofweek = [
        ['id' => 'Monday', 'text' => 'Monday'],
        ['id' => 'Tuesday', 'text' => 'Tuesday'],
        ['id' => 'Wednesday', 'text' => 'Wednesday'],
        ['id' => 'Thursday', 'text' => 'Thursday'],
        ['id' => 'Friday', 'text' => 'Friday'],
        ['id' => 'Saturday', 'text' => 'Saturday'],
        ['id' => 'Sunday', 'text' => 'Sunday'],
    ];
    public $daysofMonth = [];
    public $title;
    public $description;
    public $taskType = 'daily';
    public $selectedDays = [];
    public $selectedDate;
    public $selectedMonth;
    public $iterationType = 'dateRange';
    public $startDate;
    public $endDate;
    public $noOfIterations;
    public $task_group_id;
    public $task_groups;

    public function mount()
    {
        for ($i = 1; $i <= 31; $i++) {
            $this->daysofMonth[] = [
                'id' => $i,
                'text' => $i,
            ];
        }
        $this->getTaskGroupsProperty();
    }


    public function create()
    {
        $this->validateInputs();
        $task = new Task();
        $task->title = $this->title;
        $task->description = $this->description;
        $task->task_type = $this->taskType;
        $task->days_of_week = json_encode($this->selectedDays);
        $task->date_of_month = $this->selectedDate;
        $task->month_of_year = $this->selectedMonth;
        $task->iteration_start_date = Carbon::parse($this->startDate);
        $task->iteration_end_date = Carbon::parse($this->endDate);
        $task->iteration_count = $this->noOfIterations;
        $task->task_group_id = $this->task_group_id;
        $task->save();

        $this->reset();
        $this->getTaskGroupsProperty();
        $this->notification()->success(
            title: 'Task created successfully',
            description: 'Your task has created successfully'
        );
    }

    public function getTaskGroupsProperty()
    {
        $this->task_groups = TaskGroup::orderBy('name', 'asc')->get()->toArray();
    }

    private function validateInputs()
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'taskType' => 'required|string|in:once,daily,weekly,monthly,yearly',
            'selectedDays' => 'nullable|array',
            'selectedDate' => 'nullable|integer|min:1|max:31',
            'selectedMonth' => 'nullable|date_format:d-m-Y',
            'iterationType' => 'required|string|in:dateRange,numIterations',
            'task_group_id' => 'nullable|exists:task_groups,id',
        ];

        // add conditional rules based on tasktype and iteration type
        if ($this->taskType == 'weekly') {

            $rules['selectedDays'] = 'required|array|min:1|max:7';
        }

        if ($this->taskType == 'monthly') {
            $rules['selectedDate'] = 'required|integer|min:1|max:31';
        }

        if ($this->taskType == 'yearly') {
            $rules['selectedMonth'] = 'required|date_format:d-m-Y';
        }

        if ($this->iterationType == 'dateRange') {
            $rules['startDate'] = 'required|date_format:d-m-Y';
            $rules['endDate'] = 'required|date_format:d-m-Y';
        }
        if ($this->iterationType == 'numIterations') {
            $rules['noOfIterations'] = 'required|integer|min:1';
        }
        $messages = [
            'selectedDays' => 'Please select at least one day of the week.',

            'selectedDate' => 'Please select a valid date of the month.',

            'selectedMonth' => 'Please select a valid date of the year.',
        ];

        $this->validate($rules, [], $messages);

    }
    public function render()
    {
        return view('livewire.task.create-task');
    }
}
