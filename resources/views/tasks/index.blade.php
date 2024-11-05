<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Todo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Todo sing durung rampung</h2>

    <div class="flex justify-between mb-4">
        <a href="{{ route('tasks.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">Tambah Task mbok</a>

        <!-- Logout Button -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition">Logout</button>
        </form>
    </div>

    <!-- Tugas yang belum selesai -->
    <h3 class="text-xl font-semibold mt-6 mb-2">Todo sing durung rampung</h3>
    <ul class="space-y-4">
        @foreach ($incompleteTasks as $task)
            <li class="bg-gray-50 p-4 rounded-md shadow-sm flex justify-between items-start">
                <div>
                    <strong class="text-lg text-gray-800">{{ $task->title }}</strong>
                    <p class="text-gray-600 mt-1">{{ $task->description }}</p>
                    <small class="text-gray-500">Due: {{ $task->due_date }}</small>
                    @if($task->category)
                        <small class="text-gray-500">Category: {{ $task->category->name }}</small>
                    @endif
                </div>
                <div class="ml-4 flex flex-col">
                    <form action="{{ route('tasks.complete', $task->id) }}" method="POST" class="mb-2">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="bg-green-500 text-white rounded-md px-2 py-1 hover:bg-green-600 transition">Klik nek wis done</button>
                    </form>

                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white rounded-md px-2 py-1 hover:bg-red-600 transition">Hapus lik</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    <!-- Tugas yang sudah selesai -->
    <h3 class="text-xl font-semibold mt-6 mb-2">Tugas sing wis rampung</h3>
    <ul class="space-y-4">
        @foreach ($completedTasks as $task)
            <li class="bg-gray-50 p-4 rounded-md shadow-sm flex justify-between items-start">
                <div>
                    <strong class="text-lg text-gray-800">{{ $task->title }}</strong>
                    <p class="text-gray-600 mt-1">{{ $task->description }}</p>
                    <small class="text-gray-500">Completed on: {{ $task->updated_at->format('d M Y') }}</small>
                    @if($task->category)
                        <small class="text-gray-500">Category: {{ $task->category->name }}</small>
                    @endif
                </div>
                <div class="ml-4 flex flex-col">
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white rounded-md px-2 py-1 hover:bg-red-600 transition">Hapus lik</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

</div>
</body>
</html>
