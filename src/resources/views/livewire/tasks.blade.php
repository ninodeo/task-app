<section class="py-10 bg-white">
    <div class="max-w-4xl mx-auto px-6">
        {{-- Search Bar --}}
        <div class="mb-6">
            <input
                type="text"
                wire:model.debounce.300ms="search"
                placeholder="Search tasks..."
                class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        {{-- Task Form --}}
        @if ($message)
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 3000)"
            x-show="show"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ $message }}
        </div>
        @endif

        <form
            wire:submit.prevent="{{ $isEditing ? 'updateTask' : 'createTask' }}"
            class="bg-gray-50 p-6 rounded-lg shadow space-y-4 mb-10">
            <h2 class="text-xl font-semibold text-gray-700">
                {{ $isEditing ? 'Edit Task' : 'Create New Task' }}
            </h2>

            <input
                wire:model="title"
                type="text"
                placeholder="Title"
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required />

            <textarea
                wire:model="description"
                placeholder="Description"
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                rows="3"></textarea>

            <div class="flex gap-3">
                <button
                    type="submit"
                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition">
                    {{ $isEditing ? 'Update Task' : 'Create Task' }}
                </button>

                @if ($isEditing)
                <button
                    type="button"
                    wire:click="resetForm"
                    class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg transition">
                    Cancel
                </button>
                @endif
            </div>

            @if (session()->has('success'))
            <div class="text-green-600 text-sm mt-2">
                {{ session('success') }}
            </div>
            @endif
        </form>

        {{-- Task List --}}
        <div class="space-y-4">
            <h1 class="font-bold text-3xl">Task List</h1>
            @forelse ($tasks as $task)
            <div class="bg-white p-5 border rounded-lg shadow-sm hover:shadow-md transition">
                <div class="flex justify-between items-start gap-4">
                    <div>
                        <h3 class="text-lg font-bold {{ $task->is_completed ? 'line-through text-gray-500' : 'text-gray-800' }}">
                            {{ $task->title }}
                        </h3>
                        <p class="text-gray-600 mt-1">{{ $task->description }}</p>
                    </div>
                    <div class="flex gap-2">
                        <button
                            wire:click="toggleTaskStatus({{ $task->id }})"
                            class="text-xs px-3 py-1 rounded-full transition
                                {{ $task->is_completed ? 'bg-green-500 hover:bg-green-600' : 'bg-yellow-400 hover:bg-yellow-500' }}
                                text-white font-semibold">
                            {{ $task->is_completed ? 'Undo' : 'Complete' }}
                        </button>

                        <button
                            wire:click="editTask({{ $task->id }})"
                            class="text-xs px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-full transition">
                            Edit
                        </button>

                        <button
                            wire:click="deleteTask({{ $task->id }})"
                            class="text-xs px-3 py-1 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-full transition">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-gray-500 text-center">No tasks found.</p>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $tasks->links() }}
        </div>
    </div>
</section>