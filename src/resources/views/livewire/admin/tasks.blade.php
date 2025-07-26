<section>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8>
        <div class=" p-4 space-y-4">

        <input type="text" wire:model.debounce.300ms="search" placeholder="Search by title..." class="w-full p-2 border rounded" />
        @if ($message)
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 3000)"
            x-show="show"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ $message }}
        </div>
        @endif

        @if (session()->has('success'))
        <div class="text-green-600">{{ session('success') }}</div>
        @endif

        <div class="space-y-2 mt-4">
            @forelse ($tasks as $task)
            <div class="p-4 border rounded flex justify-between items-center">
                <div>
                    <h3 class="text-lg font-bold {{ $task->is_completed ? 'line-through text-gray-500' : '' }}">{{ $task->title }}</h3>
                    <p class="text-sm text-gray-600">By: {{ $task->user->name }} ({{ $task->user->email }})</p>
                    <p>{{ $task->description }}</p>
                </div>
                <div class="flex gap-2">
                    <button wire:click="toggleStatus({{ $task->id }})"
                        class="text-sm px-2 py-1 {{ $task->is_completed ? 'bg-green-500' : 'bg-yellow-400' }} text-white rounded">
                        {{ $task->is_completed ? 'Undo' : 'Complete' }}
                    </button>
                    <button wire:click="deleteTask({{ $task->id }})" class="px-2 py-1 bg-red-500 text-white rounded">Delete</button>
                </div>
            </div>
            @empty
            <p>No tasks available.</p>
            @endforelse
        </div>

        <div>
            {{ $tasks->links() }}
        </div>
    </div>
    </div>
</section>