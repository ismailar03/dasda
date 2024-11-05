<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Kategori Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-gray-100">

    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
        <h1 class="text-2xl font-semibold mb-6">Buat Kategori Baru</h1>
        
        <!-- Formulir untuk membuat kategori baru -->
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-lg font-medium text-gray-700 mb-2">Nama Kategori</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <button type="submit" class="w-full py-2 bg-green-500 text-white font-semibold rounded-md shadow-md hover:bg-green-600 transition duration-200">Simpan</button>
        </form>
    </div>

</body>
</html>
