<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-gray-100">

    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
        <h1 class="text-2xl font-semibold mb-6">Daftar Kategori</h1>
        
        <!-- Tombol untuk membuat kategori baru -->
        <a href="{{ route('categories.create') }}" class="inline-block px-6 py-2 mb-4 bg-blue-500 text-white font-semibold rounded-md shadow-sm hover:bg-blue-600 transition duration-200">Buat Kategori Baru</a>
        
        <!-- Daftar kategori -->
        <ul class="space-y-4">
            @foreach($categories as $category)
                <li class="flex justify-between items-center p-4 bg-gray-50 rounded-lg shadow-sm hover:bg-gray-100 transition duration-200">
                    <span class="text-lg text-gray-700">{{ $category->name }}</span>
                    
                    <div class="space-x-2">
                        <!-- Tombol Edit -->
                        <a href="{{ route('categories.edit', $category->id) }}" class="px-4 py-2 bg-yellow-500 text-white font-semibold rounded-md hover:bg-yellow-600 transition duration-200">Edit</a>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white font-semibold rounded-md hover:bg-red-600 transition duration-200">Hapus</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

</body>
</html>
