<div class="flex items-center justify-center mt-8">
    <div class="max-w-md w-full mx-auto">
        <div class="bg-gray-300 shadow-md rounded px-8 pt-6 pb-8 mb-4">
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
                    <label class="block text-gray-700 font-bold mb-2" for="username">
                        Name
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        wire:model="name" id="name" name="name" type="text" />
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2" for="password">
                        Description
                    </label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        wire:model="description" id="description" name="description"></textarea>
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Create task group
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>
