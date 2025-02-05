@extends('app')

@section('content')
<div class="bg-gray-100">
  <!-- Navbar -->
  <nav class="bg-gray-800 text-white py-4">
    <div class="container mx-auto px-4 max-w-4xl">
      <div class="text-xl font-semibold">
        Momentum
      </div>
    </div>
  </nav>

  <div class="container mx-auto py-10 px-4 mt-6 max-w-4xl">
    <!-- Content -->
    <h1 class="text-3xl font-bold text-center mb-6">
      To Do List
    </h1>

    <div class="flex justify-center">
      <div class="w-full max-w-2xl">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->any() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <!-- Form input data -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
          <form
            id="todo-form"
            action="{{ route('todo.post') }}"
            method="post">
            @csrf
            <div class="flex">
              <input
                type="text"
                class="flex-1 border border-gray-300 rounded-l-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                name="task"
                id="todo-input"
                placeholder="Add new task"
                value="{{ old('task') }}"
                required>

              <button type="submit" class="bg-blue-500 text-white px-4 rounded-r-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Save
              </button>
            </div>
          </form>
        </div>

        <!-- Searching -->
        <div class="bg-white shadow-md rounded-lg p-6">
          <form
            id="search-form"
            action=""
            method="get">
            <div class="flex mb-6">
              <input
                type="text"
                class="flex-1 border border-gray-300 rounded-l-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                name="search"
                placeholder="Search tasks">

              <button type="submit" class="bg-gray-500 text-white px-4 rounded-r-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                Search
              </button>
            </div>
          </form>

          <ul class="space-y-4" id="todo-list">
            @foreach ($tasks as $task)
            <li x-data="{ open: false }" class="flex flex-col justify-between items-center bg-gray-50 p-4 rounded-lg shadow-sm border border-red-800">
              <div class="w-full flex justify-between items-center">
                <div class="task-text">
                  {{ $task->task }}
                </div>

                <!-- Toggle button -->
                <div class="flex space-x-2">
                  <button class="bg-red-500 text-white px-2 py-1 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 delete-btn">
                    ✕
                  </button>

                  <button @click="open = !open" class="bg-blue-500 text-white px-2 py-1 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 edit-btn">
                    ✎
                  </button>
                </div>
              </div>

              <!-- Collapsible content -->
              <div class="w-full">
                <div
                  x-show="open"
                  x-transition
                  class="bg-gray-50 p-4 rounded-lg shadow-sm mt-4">
                  <form action="{{ route('todo.update', $task->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-4">
                      <div class="flex">
                        <input
                          type="text"
                          class="flex-1 border border-gray-300 rounded-l-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                          name="task"
                          value="{{ $task->task }}">

                        <button type="submit" class="bg-blue-500 text-white px-4 rounded-r-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                          Update
                        </button>
                      </div>
                    </div>

                    <div class="flex space-x-4">
                      <label class="flex items-center">
                        <input
                          type="radio"
                          value="1"
                          name="completed"
                          class="mr-2"
                          {{ $task->completed == '1' ? 'checked' : '' }}> Finish
                      </label>

                      <label class="flex items-center">
                        <input
                          type="radio"
                          value="0"
                          name="completed"
                          class="mr-2"
                          {{ $task->completed == '0' ? 'checked' : '' }}> Not Finish
                      </label>
                    </div>
                  </form>
                </div>
              </div>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('body-scripts')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>

@endpush