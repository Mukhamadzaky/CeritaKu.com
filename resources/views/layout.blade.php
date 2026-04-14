<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CeritaKu.com - Platform Menulis</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <nav class="bg-white shadow-md py-4">
        <div class="container mx-auto px-6 flex justify-between items-center max-w-4xl">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-600">CeritaKu<span class="text-gray-800">.com</span></a>
            <div>
                <a href="{{ route('home') }}" class="mx-3 text-gray-600 hover:text-indigo-600">Beranda</a>
                <a href="{{ route('stories.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">Tulis Cerita</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-8 max-w-4xl min-h-screen">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white text-center py-6 mt-12">
        <p>&copy; 2026 CeritaKu.com. Dibuat dengan Laravel.</p>
    </footer>

</body>
</html>