<?php

namespace App\Livewire\Admin;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class Tasks extends Component
{
    use WithPagination;

    // Search input
    public $search = '';

    // Status message
    public $message;

    // Render all task with search and pagination
    public function render()
    {
        $tasks = Task::with('user')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.tasks', compact('tasks'))
            ->layout('layouts.app', ['header' => 'Admin: All Tasks']);
    }

    // Reset search input
    public function resetSearch()
    {
        $this->reset('search');
    }

    // Toggle task status
    public function toggleStatus($taskId)
    {
        $task = Task::findOrFail($taskId);
        $task->is_completed = !$task->is_completed;
        $task->save();

        $this->message = $task->is_completed ? 'Task marked as completed.' : 'Task marked as pending.';
    }

    // Delete a task
    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        $this->message = 'Task deleted successfully.';
        session()->flash('message', 'Task deleted successfully.');
    }
}
