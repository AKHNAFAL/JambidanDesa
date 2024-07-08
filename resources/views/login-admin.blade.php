<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 flex items-center justify-center h-screen">
<!-- Login Form -->
<div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-sm">
    <h2 class="text-2xl font-bold mb-6 text-center text-white">Login</h2>
    <form action="{{ route('login.admin') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-400 mb-2" for="username">Username</label>
            <input type="text" id="username" name="username" class="w-full p-3 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-gray-600" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-400 mb-2" for="password">Password</label>
            <input type="password" id="password" name="password" class="w-full p-3 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-gray-600" required>
        </div>
        <div class="mb-6">
            <span class="text-white">Lupa Password? <a href="#" class="text-blue-400">disini</a></span>
        </div>
        <button type="submit" class="w-full p-3 rounded bg-blue-600 hover:bg-blue-700 text-white font-bold">Login</button>
    </form>
    <a href="/">>></a>
</div>

</body>

</html>
