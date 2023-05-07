<header class="bg-gray-300 shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <nav class="hidden md:block">
                <ul class="flex space-x-4">
                    <li>
                        <a href="{{route('taskgroup')}}" class="{{ request()->is('/') ? 'bg-blue-300 p-2 rounded-sm' : '' }} text-gray-800 hover:text-gray-900 font-medium">Task group</a>
                    </li>
                    <li>
                        <a href="{{route('task.create')}}" class="{{ request()->is('task/create') ? 'bg-blue-300 p-2 rounded-sm' : '' }} text-gray-800 hover:text-gray-900 font-medium">New Task</a>
                    </li>
                    <li>
                        <a href="{{route('task.pending-task')}}" class="{{ request()->is('task/pending') ? 'bg-blue-300 p-2 rounded-sm' : '' }} text-gray-800 hover:text-gray-900 font-medium">Pending Task</a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>

</header>
