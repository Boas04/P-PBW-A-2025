<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | LaraPress</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-gradient-to-b from-blue-100 via-white to-blue-50 flex flex-col">

    <!-- 🔹 NAVBAR -->
    <nav class="bg-blue-800 text-white shadow-lg p-4 flex justify-between items-center sticky top-0 z-50">
        <h1 class="text-2xl font-extrabold tracking-wide">LaraPress</h1>

        <div class="flex gap-6 items-center">
            @auth
                <a href="{{ url('/dashboard') }}" class="hover:text-blue-200 transition">Dashboard</a>
                <a href="{{ url('/posts/create') }}" class="hover:text-green-300 transition">Create Post</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-red-300 transition">Logout</button>
                </form>
            @endauth
        </div>
    </nav>

    <!-- 🔹 HERO SECTION -->
    <section class="flex-grow flex flex-col justify-center items-center text-center">
        <h2 class="text-4xl font-bold text-gray-800 mb-4">Selamat Datang di <span class="text-blue-700">LaraPress</span></h2>
        <p class="text-gray-600 text-lg mb-8">Website autentikasi & CRUD </p>

        <div class="flex gap-4">
            @auth
                <a href="{{ url('/dashboard') }}" class="px-6 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-600 transition">Ke Dashboard</a>
                <a href="{{ url('/posts/create') }}" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-500 transition">Buat Post</a>
            @else
                <a href="{{ route('login') }}" class="px-6 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-600 transition">Login</a>
                <a href="{{ route('register') }}" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-500 transition">Register</a>
            @endauth
        </div>
    </section>

    <!-- 🔹 FOOTER -->
    <footer class="bg-blue-800 text-white text-center py-3 mt-auto text-sm">
        &copy; {{ date('Y') }} LaraPress. Dibuat Oleh Abner.
    </footer>

</body>
</html>
