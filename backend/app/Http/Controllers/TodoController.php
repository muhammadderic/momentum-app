<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $tasks = Todo::orderBy('task', 'asc')->get();
    return view('todo.todo', compact('tasks'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'task' => 'required|min:3'
    ], [
      'task.required' => 'The task field is required',
      'task.min' => 'The task field must be at least 3 characters'
    ]);

    $newTask = [
      'task' => $request->input('task')
    ];

    Todo::create($newTask);
    return redirect()->route('todo')->with('success', 'Task added successfully');
  }

  /**
   * Display the specified resource.
   */
  public function show(Todo $todo)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Todo $todo)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $request->validate([
      'task' => 'required|min:3'
    ], [
      'task.required' => 'The task field is required',
      'task.min' => 'The task field must be at least 3 characters'
    ]);

    $updateTask = [
      'task' => $request->input('task'),
      'completed' => $request->input('completed')
    ];

    Todo::where('id', $id)->update($updateTask);
    return redirect()->route('todo')->with('success', 'Task updated successfully');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    Todo::where('id', $id)->delete();
    return redirect()->route('todo')->with('success', 'Task deleted successfully');
  }
}
