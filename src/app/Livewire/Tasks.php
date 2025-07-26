<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class Tasks extends Component
{
    use WithPagination;

    // Status message
    public $message;

    // Task properties
    public $title, $description, $taskID, $isEditing = false, $search = '';

    // Validation rules
    protected $rules = [
        'title' => 'required|min:3',
        'description' => 'required|min:5',
    ];

    // Render method to display the tasks
    public function render()
    {
        $tasks = Task::where('user_id', auth()->id())
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate(5);
        return view('livewire.tasks', compact('tasks'))
            ->layout('layouts.app', ['header' => 'My Tasks']);
    }

    // Reset form fields
    public function resetForm()
    {
        $this->reset(['title', 'description', 'taskID', 'isEditing']);
    }


    // Create a new task for the authenticated user
    public function createTask()
    {
        $this->validate();

        Task::create([
            'user_id' => auth()->id(),
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $this->message = 'Task created successfully.';
        session()->flash('message', 'Task created successfully.');
        $this->resetForm();
    }

    // Edit an existing task
    public function editTask($id)
    {
        $task = Task::where('user_id', auth()->id())->findOrFail($id);
        $this->taskID = $task->id;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->isEditing = true;
    }


    // Update the task
    public function updateTask()
    {
        $this->validate();

        $task = Task::where('user_id', auth()->id())->findOrFail($this->taskID);
        $task->update([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $this->message = 'Task updated successfully.';
        session()->flash('message', 'Task updated successfully.');
        $this->resetForm();
    }

    // Delete a task
    public function deleteTask($id)
    {
        $task = Task::where('user_id', auth()->id())->findOrFail($id);
        $task->delete();

        $this->message = 'Task deleted successfully.';
        $this->message = 'Task deleted successfully.';
    }

    // Toggle the completion status of a task
    public function toggleTaskStatus($id)
    {
        $task = Task::where('user_id', auth()->id())->findOrFail($id);
        $task->is_completed = !$task->is_completed;
        $task->save();

        $this->message = 'Task status updated successfully.';
        session()->flash('message', 'Task status updated successfully.');
    }
}
