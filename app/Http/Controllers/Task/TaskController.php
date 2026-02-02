<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Auth::user()->tasks()->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Auth::user()->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('tasks.index')->with('success', 'تمت إضافة المهمة بنجاح.');
    }

    public function update(Request $request, $id)
    {
        $task = Auth::user()->tasks()->findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'تم تحديث المهمة بنجاح.');
    }

    public function destroy($id)
    {
        $task = Auth::user()->tasks()->findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'تم حذف المهمة بنجاح.');
    }

    public function toggleComplete($id)
    {
        $task = Auth::user()->tasks()->findOrFail($id);

        $task->update([
            'is_completed' => !$task->is_completed
        ]);

        return redirect()->route('tasks.index');
    }
}
