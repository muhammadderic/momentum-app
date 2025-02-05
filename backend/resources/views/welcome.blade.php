<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>momentum</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Styles / Scripts -->
  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @else
  @vite(['resources/css/custom.css', 'resources/js/app.js'])
  @endif
</head>

<body class="bg-gray-100">
  <!-- 00. Navbar -->
  <nav class="bg-gray-800 text-white py-4">
    <div class="container mx-auto px-4 max-w-4xl">
      <div class="text-xl font-semibold">
        Momentum
      </div>
    </div>
  </nav>

  <div class="container mx-auto px-4 mt-6 max-w-4xl">
    <!-- Content -->
    <h1 class="text-3xl font-bold text-center mb-6">
      To Do List
    </h1>

    <div class="flex justify-center">
      <div class="w-full max-w-2xl">
        <!-- Form input data -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
          <form
            id="todo-form"
            action=""
            method="post">
            <div class="flex">
              <input
                type="text"
                class="flex-1 border border-gray-300 rounded-l-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                name="task"
                id="todo-input"
                placeholder="Add new task"
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
            <!-- 04. Display Data -->
            <li class="flex justify-between items-center bg-gray-50 p-4 rounded-lg shadow-sm">
              <span class="task-text">
                Coding
              </span>

              <input
                type="text"
                class="hidden border border-gray-300 rounded-lg p-1 focus:outline-none focus:ring-2 focus:ring-blue-500 edit-input"
                value="Coding">

              <div class="flex space-x-2">
                <button class="bg-red-500 text-white px-2 py-1 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 delete-btn">✕</button>
                <button class="bg-blue-500 text-white px-2 py-1 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 edit-btn">✎</button>
              </div>
            </li>

            <!-- 05. Update Data -->
            <li class="bg-gray-50 p-4 rounded-lg shadow-sm mt-4">
              <form action="" method="POST">
                <div class="mb-4">
                  <div class="flex">
                    <input
                      type="text"
                      class="flex-1 border border-gray-300 rounded-l-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                      name="task"
                      value="Coding">

                    <button type="button" class="bg-blue-500 text-white px-4 rounded-r-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                      Update
                    </button>
                  </div>
                </div>

                <div class="flex space-x-4">
                  <label class="flex items-center">
                    <input
                      type="radio"
                      value="1"
                      name="is_done"
                      class="mr-2"> Finish
                  </label>
                  <label class="flex items-center">
                    <input
                      type="radio"
                      value="0"
                      name="is_done"
                      class="mr-2"> Not Finish
                  </label>
                </div>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</body>

</html>