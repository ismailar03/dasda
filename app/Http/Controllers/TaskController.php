<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // Display all incomplete tasks
    public function index()
    {
        // Ambil semua tugas yang belum selesai milik pengguna yang sedang login
        $incompleteTasks = Auth::user()->tasks()->where('completed', false)->with('category')->get();

        // Ambil semua tugas yang sudah selesai milik pengguna yang sedang login
        $completedTasks = Auth::user()->tasks()->where('completed', true)->with('category')->get();

        // Kirimkan kedua data tugas ke view
        return view('tasks.index', compact('incompleteTasks', 'completedTasks'));
    
    }

    // Show form to create a new task
    public function create()
    {
        $categories = Auth::user()->categories()->pluck('name', 'id'); // User's categories
        return view('tasks.create', compact('categories'));
    }

    // Store a new task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        Auth::user()->tasks()->create($request->only('title', 'description', 'due_date', 'category_id'));

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    // Mark task as completed
    public function complete($id)
    {
        $task = Auth::user()->tasks()->findOrFail($id);
        $task->update(['completed' => true]);

        return redirect()->route('tasks.index')->with('success', 'Task marked as completed');
    }

    // Delete a task
    public function destroy($id)
    {
        $task = Auth::user()->tasks()->findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
}
