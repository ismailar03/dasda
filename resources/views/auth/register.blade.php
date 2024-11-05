<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm">
        <h1 class="text-2xl font-semibold text-center mb-6">Register</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 border border-green-300 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <ul class="bg-red-100 text-red-700 border border-red-300 p-2 rounded mb-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('auth.register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username:</label>
                <input type="text" name="username" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>
            
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" name="email" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>
            
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                <input type="password" name="password" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>
            
            <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md hover:bg-blue-600 transition">Register</button>
        </form>

        <p class="mt-4 text-center">Wis due akun? <a href="{{ route('auth.login') }}" class="text-blue-500 hover:underline">Login bae langsung</a></p>
    </div>
</body>
</html>
