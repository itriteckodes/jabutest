<div class="mt-4">
    <div class="w-full">
        <div class="bg-gray-50 border shadow-md rounded px-8 pt-4 pb-4 ">
            <h2 class="text-center text-gray-800 font-bold text-2xl mb-4">Create Task</h2>
            <form wire:submit.prevent="create">
                <div class="grid grid-cols-12 gap-1">
                    <div class="col-span-6">
                        <x-input label="Title" wire:model="title" placeholder="Enter title of task" />
                    </div>
                    <div class="col-span-6">
                        <x-textarea wire:model="description" label="Description" placeholder="" class="h-10" />
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-1 mt-3">

                    <div class="col-span-6">
                        <x-select label="Task type" placeholder="Select task type" wire:model="taskType"
                            :options="$frequencies" option-label="text" option-value="id" />
                    </div>


                    <div class="col-span-6 {{ $taskType == 'weekly' ? 'block' : 'hidden' }}">
                        <x-select label="Days of week" placeholder="Select days of week" :options="$daysofweek"
                            wire:model='selectedDays' option-label="text" option-value="id" multiselect />
                    </div>

                    <div class="col-span-6 {{ $taskType == 'monthly' ? 'block' : 'hidden' }}">
                        <x-select label="Date of month" placeholder="Select date of month" :options="$daysofMonth"
                            wire:model='selectedDate' option-label="text" option-value="id" />
                    </div>
                    <div class="col-span-6 {{ $taskType == 'yearly' ? 'block' : 'hidden' }}">
                        <x-datetime-picker label="Date of year" parse-format="DD-MM-YYYY" without-tips=true
                            without-timezone=true without-time=true placeholder="Select date of year"
                            wire:model="selectedMonth" />

                    </div>
                </div>
                <div class="grid grid-cols-12 gap-1 mt-3">
                    <div class="col-span-12">
                        <label class="block text-gray-700 font-bold mb-2">
                            Iteration type
                        </label>
                        <x-radio id="right-label" md label="Date A to B" value="dateRange"
                            wire:model="iterationType" />
                        <div class="h-2"></div>
                        <x-radio id="right-label" md label="Number of Iterations" value="numIterations"
                            wire:model="iterationType" />

                    </div>

                </div>
                <div class="grid grid-cols-12 gap-1 mt-3">
                    <div class="col-span-6 {{ $iterationType == 'dateRange' ? 'block' : 'hidden' }}">
                        <div class="grid grid-cols-12 ">
                            <div class="col-span-6">
                                <x-datetime-picker label="Start Date" parse-format="DD-MM-YYYY" without-tips=true
                                    without-timezone=true without-time=true placeholder="Select start date"
                                    wire:model="startDate" class="w-full" />
                            </div>
                            <div class="col-span-6 ml-2">
                                <x-datetime-picker label="End Date" parse-format="DD-MM-YYYY" without-tips=true
                                    without-timezone=true without-time=true placeholder="Select end date"
                                    wire:model="endDate" class="w-full" />
                            </div>
                        </div>
                    </div>
                    <div class="col-span-6 {{ $iterationType == 'numIterations' ? 'block' : 'hidden' }}">
                        <x-inputs.number label="No of iterations" wire:model='noOfIterations'/>
                    </div>
                    <div class="col-span-6">
                        <x-select label="Task Group" placeholder="Task group" wire:model="task_group_id"
                            :options="$task_groups" option-label="name" option-value="id" />

                    </div>

                </div>
                <div class="my-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Create Task
                    </button>
                </div>
            </form>
        </div>
    </div>


</div>
