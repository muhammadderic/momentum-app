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
    return view('todo.todo');
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
  public function update(Request $request, Todo $todo)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Todo $todo)
  {
    //
  }
}
