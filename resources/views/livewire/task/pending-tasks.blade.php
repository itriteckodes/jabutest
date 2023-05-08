<div x-data="{ activeTab: '{{ str_replace(' ', '', $tasks->keys()->first()) }}' }">
    <ul class="flex border-b mb-4 mt-4 mx-4">
        @foreach ($tasks->keys() as $group)
            <li class="-mb-px mr-1">
                <button class="inline-block py-2 px-4  bg-gray-100 text-gray-800 font-semibold"
                    :class="{ 'border-l border-t border-r rounded-t bg-blue-100 text-blue-800': activeTab ===
                            '{{ str_replace(' ', '', $group) }}' }"
                    @click="activeTab = '{{ str_replace(' ', '', $group) }}'">{{ $group }}</button>
            </li>
        @endforeach
    </ul>

    @foreach ($tasks as $group => $group_tasks)
        <div x-show="activeTab === '{{ str_replace(' ', '', $group) }}'">
            @foreach ($group_tasks as $task)
                <div class="p-6 bg-white shadow-md rounded-lg mb-4 border mx-4">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            @if ($task->taskGroup)
                                <div class="text-gray-600 font-bold mr-2">{{ $task->taskGroup->name }}</div>
                            @endif
                            <div class="text-gray-800 font-bold text-xl">{{ $task->title }}</div>
                        </div>
                        @if (!$task->completed)
                        <button wire:click="markAsCompleted({{ $task->id }})"
                            class="bg-primary-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors duration-300">
                            Mark as Completed
                        </button>
                        @else
                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-green-500 text-white">
                            Task Completed
                          </span>
                        @endif

                    </div>
                    <div class="text-gray-600 mb-4">{{ $task->description }}</div>
                    <div class="text-gray-700">Iterations: {{ $task->iteration_count }}</div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
