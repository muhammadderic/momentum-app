@extends('app')

@section('content')
<div class="bg-gray-100">
  <div class="container mx-auto px-4 mt-6 max-w-4xl">
    <div class="flex justify-center">
      <div class="w-full max-w-2xl">
        <div class="bg-white shadow-md rounded-lg p-6">
          <ul class="space-y-4" id="todo-list">
            @foreach ($tasks as $task)
            <li x-data="{ open: false }" class="flex justify-between items-center bg-gray-50 p-4 rounded-lg shadow-sm">
              <span class="task-text">
                {{ $task->task }}
              </span>

              <input
                type="text"
                class="hidden border border-gray-300 rounded-lg p-1 focus:outline-none focus:ring-2 focus:ring-blue-500 edit-input"
                value="{{ $task->task }}">

              <!-- Toggle button -->
              <div class="flex space-x-2">
                <button class="bg-red-500 text-white px-2 py-1 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 delete-btn">✕</button>
                <button @click="open = !open" class="bg-blue-500 text-white px-2 py-1 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 edit-btn">✎</button>
              </div>

              <!-- Collapsible content -->
              <div x-show="open" x-transition class="bg-gray-50 p-4 rounded-lg shadow-sm mt-4">
                <form action="" method="POST">
                  <div class="mb-4">
                    <div class="flex">
                      <input type="text" class="flex-1 border border-gray-300 rounded-l-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" name="task" value="{{ $task->task }}">
                      <button type="button" class="bg-blue-500 text-white px-4 rounded-r-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Update</button>
                    </div>
                  </div>
                  <div class="flex space-x-4">
                    <label class="flex items-center">
                      <input type="radio" value="1" name="completed" class="mr-2" {{ $task->completed == '1' ? 'checked' : '' }}> Finish
                    </label>
                    <label class="flex items-center">
                      <input type="radio" value="0" name="completed" class="mr-2" {{ $task->completed == '0' ? 'checked' : '' }}> Not Finish
                    </label>
                  </div>
                </form>
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