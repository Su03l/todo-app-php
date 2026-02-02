<?php

namespace App\Livewire\Tasks;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $tasks;

    // متغيرات المودال (للإضافة والتعديل)
    public $showModal = false;
    public $isEditMode = false;
    public $taskId = null;
    public $title = '';
    public $description = '';

    public function mount()
    {
        $this->loadTasks();
    }

    public function loadTasks()
    {
        // جلب المهام: الغير مكتملة أولاً، ثم المكتملة، مرتبة بالأحدث
        $this->tasks = Auth::user()->tasks()
            ->orderBy('is_completed', 'asc')
            ->latest()
            ->get();
    }

    // فتح المودال للإضافة
    public function openCreateModal()
    {
        $this->reset(['title', 'description', 'taskId', 'isEditMode']);
        $this->showModal = true;
    }

    // فتح المودال للتعديل
    public function openEditModal($id)
    {
        $task = Auth::user()->tasks()->find($id);
        $this->taskId = $task->id;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->isEditMode = true;
        $this->showModal = true;
    }

    // الحفظ (سواء جديد أو تعديل)
    public function save()
    {
        $this->validate(['title' => 'required|string|max:255']);

        if ($this->isEditMode) {
            Auth::user()->tasks()->find($this->taskId)->update([
                'title' => $this->title,
                'description' => $this->description,
            ]);
        } else {
            Auth::user()->tasks()->create([
                'title' => $this->title,
                'description' => $this->description,
            ]);
        }

        $this->showModal = false;
        $this->loadTasks();
    }

    // الحذف
    public function delete($id)
    {
        Auth::user()->tasks()->find($id)->delete();
        $this->loadTasks();
    }

    // تغيير الحالة (مكتمل/غير مكتمل)
    public function toggle($id)
    {
        $task = Auth::user()->tasks()->find($id);
        $task->update(['is_completed' => !$task->is_completed]);
        $this->loadTasks();
    }

    public function render()
    {
        return view('livewire.tasks.index')->layout('layouts.app');
    }
}
