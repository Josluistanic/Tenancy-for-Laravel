<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::paginate(10);

        return view('tenant.task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenant.task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image_url' => 'required|image',
        ]);

        $validated['image_url'] = Storage::put('tasks', $request->file('image_url'));

        $task = Task::create($validated);

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tenant.task.show', [
            'task' => $task,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tenant.task.edit', [
            'task' => $task,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image_url' => 'nullable|image  ',
        ]);

        if ($request->hasFile('image_url')) {
            Storage::delete($task->image_url);
            $data['image_url'] = Storage::put('tasks', $request->file('image_url'));
        }

        $task->update($data);

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        Storage::delete($task->image_url);
        $task->delete();

        return redirect()->route('tasks.index');
    }
}