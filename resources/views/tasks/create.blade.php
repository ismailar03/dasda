<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Todo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Optional custom styles */
        body {
            background-color: #f8fafc; /* Tailwind's cool-gray-100 */
        }
    </style>
</head>
<body>
<div class="max-w-md mx-auto mt-10 bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Create New Todo</h2>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
            <input type="text" id="title" name="title" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
            <textarea id="description" name="description" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300" rows="4"></textarea>
        </div>

        <div class="mb-4">
            <label for="due_date" class="block text-sm font-medium text-gray-700">Due Date:</label>
            <input type="date" id="due_date" name="due_date" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
        </div>

        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-gray-700">Category:</label>
            <select id="category_id" name="category_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
                <option value="">Select a category</option>
                @foreach($categories as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-md transition duration-150">Save</button>
    </form>
</div>
</body>
</html>
