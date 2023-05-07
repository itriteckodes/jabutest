<div class="px-2">
    <div class="flex justify-between mt-4 mx-2">
        <div class="mt-2">

        </div>
        <div>
            <a href="{{ route('taskgroup.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <span class="pl-2 text-sm">Create task group</span>
            </a>
        </div>

    </div>
    <div class="flex flex-col mt-4 mx-2 h-full">
        {{$this->table}}
</div>
