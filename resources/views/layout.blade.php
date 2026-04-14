<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CeritaKu.com - Platform Menulis</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <nav class="bg-white/90 backdrop-blur-md sticky top-0 z-50 shadow-sm py-4 border-b border-gray-100">
        <div class="container mx-auto px-6 flex justify-between items-center max-w-5xl">
            
            <a href="{{ route('home') }}" class="text-2xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-pink-500 hover:scale-105 transition-transform origin-left">
                CeritaKu<span class="text-gray-800">.com</span>
            </a>
            
            <div class="flex items-center gap-5">
                <a href="{{ route('home') }}" class="text-gray-600 font-semibold hover:text-indigo-600 transition-colors">Beranda</a>
                
                @auth
                    <a href="{{ route('stories.create') }}" class="flex items-center gap-2 bg-indigo-600 text-white font-bold px-5 py-2.5 rounded-full hover:bg-indigo-700 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                        Tulis Cerita
                    </a>
                @else
                    <a href="{{ route('login', ['redirect' => route('stories.create')]) }}" class="flex items-center gap-2 bg-indigo-600 text-white font-bold px-5 py-2.5 rounded-full hover:bg-indigo-700 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                        Tulis Cerita
                    </a>
                @endauth
                
                <div class="h-6 w-px bg-gray-200 mx-1 hidden sm:block"></div>
                
                @guest
                    <a href="{{ route('login') }}" class="text-gray-600 font-semibold hover:text-indigo-600 transition-colors">Masuk</a>
                    <a href="{{ route('register') }}" class="bg-indigo-50 text-indigo-600 font-bold px-6 py-2.5 rounded-full hover:bg-indigo-100 transition-colors border border-indigo-100 hover:border-indigo-200">Daftar Akun</a>
                @endguest

                @auth
                    <div class="relative group">
                        <button class="flex items-center gap-2 font-bold text-gray-700 hover:text-indigo-600 transition-colors">
                            <img src="https://api.dicebear.com/7.x/adventurer/svg?seed={{ urlencode(auth()->user()->name) }}&backgroundColor=b6e3f4" class="w-9 h-9 rounded-full border-2 border-indigo-50 shadow-sm group-hover:border-indigo-200 transition-colors">
                            {{ auth()->user()->name }}
                        </button>
                        
                        <div class="absolute right-0 mt-3 w-52 bg-white border border-gray-100 rounded-2xl shadow-xl py-2 hidden group-hover:block z-50">
                            <a href="{{ route('stories.mine') }}" class="block px-5 py-2.5 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 font-semibold transition-colors">📚 Karyaku</a>
                            <a href="{{ route('profile.edit') }}" class="block px-5 py-2.5 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 font-semibold transition-colors">⚙️ Pengaturan Akun</a>
                            
                            <div class="h-px bg-gray-100 my-1"></div>
                            
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-5 py-2.5 text-sm text-red-600 hover:bg-red-50 font-semibold transition-colors">🚪 Keluar</button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
    
    </body>
</html>