<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Total Tasks -->
            <div class="bg-white p-6 rounded-lg shadow text-center">
                <h3 class="text-lg font-semibold text-gray-700">Total Tasks</h3>
                <p class="text-3xl font-bold text-blue-600">{{ $totalTasks }}</p>
            </div>

            <!-- Completed Tasks -->
            <div class="bg-white p-6 rounded-lg shadow text-center">
                <h3 class="text-lg font-semibold text-gray-700">Completed</h3>
                <p class="text-3xl font-bold text-green-600">{{ $completedTasks }}</p>
            </div>

            <!-- Pending Tasks -->
            <div class="bg-white p-6 rounded-lg shadow text-center">
                <h3 class="text-lg font-semibold text-gray-700">Pending</h3>
                <p class="text-3xl font-bold text-yellow-500">{{ $pendingTasks }}</p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto mt-8 sm:px-6 lg:px-8">
            <a href="{{ route('tasks') }}"
                class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Manage Tasks
            </a>
        </div>
    </div>
</x-app-layout>