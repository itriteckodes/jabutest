<div class="mt-8">
    <a href="{{route('taskgroup')}}" class="flex text-xl"><x-icon name="arrow-left" class="w-7 h-7 mr-2" />Exit</a>
    <div class="flex items-center justify-center ">
        <div class="max-w-md w-full mx-auto">
            <div class="bg-gray-50 border shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h2 class="text-center text-gray-800 font-bold text-2xl mb-4">Create task group</h2>
                <form wire:submit.prevent="create">
                    <div>
                        @if (session()->has('message'))
                            <div class="text-green-800">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-4">
                       <x-input label="Name" wire:model="name" id="name" name="name" />
                    </div>
                    <div class="mb-6">
                        <x-textarea wire:model="description" label="Description" placeholder="" class="h-10" />
                    </div>
                    <div class="flex items-center justify-end">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            + Create
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
