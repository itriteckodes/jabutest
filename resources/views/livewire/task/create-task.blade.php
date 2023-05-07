<div class="mt-8">
    <div class="mx-8 w-full">
        <div class="bg-blue-200 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-center text-gray-800 font-bold text-2xl mb-4">Create Task</h2>
            <form wire:submit.prevent="create">
                <div class="grid grid-cols-12 gap-1">
                    <div class="col-span-3">
                        <x-input label="Title" wire:model="title"  placeholder="your name" />
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="title">
                                Title
                            </label>
                            <input wire:model="title" id="title" name="title" type="text"
                                class="w-full border-gray-400 rounded-lg py-2 px-4">
                        </div>
                    </div>
                    <div class="col-span-3">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="description">
                                Description
                            </label>
                            <textarea wire:model="description" id="description" name="description" class="w-full border-gray-400 rounded-lg  px-4"></textarea>
                        </div>
                    </div>
                    <div class="col-span-3">

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="due_date">
                                Due Date
                            </label>
                            <input wire:model="due_date" id="due_date" name="due_date" type="date"
                                class="w-full border-gray-400 rounded-lg py-2 px-4">
                        </div>
                    </div>
                    <div class="col-span-3">

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="frequency">
                                Frequency
                            </label>
                            <select wire:model="frequency" id="frequency" name="frequency"
                                class="w-full border-gray-400 rounded-lg py-2 px-4">
                                <option value="Daily">Daily</option>
                                <option value="Weekly">Weekly</option>
                                <option value="Monthly">Monthly</option>
                                <option value="Yearly">Yearly</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-span-3">

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="iteration_start_date">
                                Iteration Start Date
                            </label>
                            <input wire:model="iteration_start_date" id="iteration_start_date"
                                name="iteration_start_date" type="date"
                                class="w-full border-gray-400 rounded-lg py-2 px-4">
                        </div>
                    </div>
                    <div class="col-span-3">

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="iteration_end_date">
                                Iteration End Date
                            </label>
                            <input wire:model="iteration_end_date" id="iteration_end_date" name="iteration_end_date"
                                type="date" class="w-full border-gray-400 rounded-lg py-2 px-4">
                        </div>
                    </div>
                    <div class="col-span-3">

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="iteration_count">
                                Iteration Count
                            </label>
                            <input wire:model="iteration_count" id="iteration_count" name="iteration_count"
                                type="number" class="w-full border-gray-400 rounded-lg py-2 px-4">
                        </div>
                    </div>
                    <div class="col-span-3">

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="task_group_id">
                                Task Group
                            </label>
                            <select wire:model="task_group_id" id="task_group_id" name="task_group_id"
                                class="w-full border-gray-400 rounded-lg py-2 px-4">
                                <option value="">None</option>
                                @foreach ($task_groups as $task_group)
                                    <option value="{{ $task_group['id'] }}">{{ $task_group['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Create Task
                    </button>
                </div>
            </form>
        </div>
    </div>
    <x-card title="Personal Information">
        <x-errors class="mb-4" />
     
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <x-input label="First Name" placeholder="First Name" wire:model.defer="user.first_name" />
            <x-input label="Last Name"  placeholder="Last Name" wire:model.defer="user.last_name" />
     
            <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-7 sm:gap-5">
                <div class="col-span-1 sm:col-span-4">
                    <x-input label="Email" placeholder="example@mail.com" wire:model.defer="user.email" />
                </div>
     
                <div class="col-span-1 sm:col-span-3">
                    <x-inputs.phone label="Phone" placeholder="Phone" wire:model.defer="user.phone" />
                </div>
            </div>
     
            <x-select
                label="Country"
                placeholder="Country"
                wire:model.defer="user.country"
                :options="""
            />
     
            <x-datetime-picker label="Birthdate" placeholder="Birthdate" wire:model.defer="user.birthdate" />
     
            <div class="col-span-1 sm:col-span-2">
                <x-input label="Street Address" placeholder="Street Address" wire:model.defer="user.street" />
            </div>
     
            <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-6">
                <x-input label="City" placeholder="City" wire:model.defer="user.city" />
                <x-input label="State" placeholder="State" wire:model.defer="user.state" />
                <x-input label="Postal Code" placeholder="Postal Code" wire:model.defer="user.postal_code" />
            </div>
     
            <x-toggle label="Accept the terms and conditions" wire:model.defer="user.terms" />
        </div>
     
        <x-slot name="footer">
            <div class="flex items-center gap-x-3 justify-end">
                <x-button wire:click="cancel" label="Cancel" flat />
                <x-button wire:click="save" label="Save" spinner="save" primary />
            </div>
        </x-slot>
    </x-card>
    
</div>

