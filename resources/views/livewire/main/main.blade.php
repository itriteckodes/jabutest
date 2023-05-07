<div class="mx-5 py-4 mb-8">
    <div x-data="{
        activeTab: @entangle('tasktab'),
        activeClass: 'border-indigo-500 text-indigo-600 font-mont whitespace-nowrap pb-4 px-1 border-b-2 font-semibold text-lg',
        inactiveClass: 'font-mont font-mont border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pb-4 px-1 border-b-2 font-semibold text-lg'
    }" class="w-full mb-8">
        <div class="sm:pb-0 border-b-2 ">
            <nav class="flex -mb-px space-x-4">
                <a aria-current="page" x-on:click="activeTab = 1"
                    :class="activeTab === 1 ? activeClass : inactiveClass">
                    Task List
                </a>
                <a aria-current="page" x-on:click="activeTab = 2"
                    :class="activeTab === 2 ? activeClass : inactiveClass">
                     Create Task
                </a>
                <a aria-current="page" x-on:click="activeTab = 3"
                    :class=" activeTab === 3 ? activeClass : inactiveClass">
                    Task Group
                </a>
            </nav>

        </div>
        <div x-show="activeTab === 1">
            <livewire:pending-tasks />

        </div>
        <div x-show="activeTab === 2">
            <livewire:create-task />
        </div>
        <div x-show="activeTab === 3">
            <livewire:task-groups />

        </div>
    </div>
</div>
