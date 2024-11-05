<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-gray-100">

    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
        <h1 class="text-2xl font-semibold mb-6">Edit Kategori</h1>
        
        <!-- Formulir untuk mengedit kategori -->
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="name" class="block text-lg font-medium text-gray-700 mb-2">Nama Kategori</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ $category->name }}" required>
            </div>

            <button type="submit" class="w-full py-2 bg-blue-500 text-white font-semibold rounded-md shadow-md hover:bg-blue-600 transition duration-200">Perbarui</button>
        </form>
    </div>

</body>
</html>
