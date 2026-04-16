<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CeritaKu.com - Platform Menulis</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased">

    <nav class="bg-slate-950/95 backdrop-blur-xl sticky top-0 z-50 shadow-2xl border-b border-slate-800">
        <div class="container mx-auto px-6 py-4 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between max-w-6xl">
            <div class="flex items-center gap-4">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3 text-2xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-indigo-400 to-fuchsia-500 hover:scale-105 transition-transform">
                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-white/10 text-white">C</span>
                    <span>CeritaKu<span class="text-slate-100">.com</span></span>
                </a>
            </div>

            <div class="flex flex-wrap items-center gap-3 justify-end">
                <a href="{{ route('home') }}" class="text-slate-200 hover:text-white transition-colors font-semibold">Beranda</a>
                <a href="{{ route('stories.all') }}" class="text-slate-200 hover:text-white transition-colors font-semibold">Semua Cerita</a>
                
                @auth
                    <a href="{{ route('stories.create') }}" class="inline-flex items-center gap-2 bg-indigo-600 text-white font-semibold px-5 py-2.5 rounded-full shadow-lg shadow-indigo-200/40 hover:bg-indigo-700 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                        Tulis Cerita
                    </a>
                @else
                    <a href="{{ route('login', ['redirect' => route('stories.create')]) }}" class="inline-flex items-center gap-2 bg-indigo-600 text-white font-semibold px-5 py-2.5 rounded-full shadow-lg shadow-indigo-200/40 hover:bg-indigo-700 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                        Tulis Cerita
                    </a>
                @endauth

                <div class="h-6 w-px bg-slate-200"></div>

                @guest
                    <a href="{{ route('login') }}" class="text-slate-200 font-semibold hover:text-white transition-colors">Masuk</a>
                    <a href="{{ route('register') }}" class="text-white font-semibold px-5 py-2.5 rounded-full border border-slate-700 bg-white/5 hover:bg-white/15 transition-all">Daftar Akun</a>
                @endguest

                @auth
                    <div class="relative group">
                        <button class="inline-flex items-center gap-2 rounded-full border border-slate-700 bg-slate-900 px-3 py-2 shadow-sm hover:shadow-md transition-all">
                            <img src="https://api.dicebear.com/7.x/adventurer/svg?seed={{ urlencode(auth()->user()->name) }}&backgroundColor=b6e3f4" class="w-9 h-9 rounded-full border-2 border-indigo-100 shadow-sm">
                            <span class="font-semibold text-white">{{ auth()->user()->name }}</span>
                        </button>
                        <div class="absolute right-0 mt-3 w-56 rounded-3xl border border-slate-700 bg-slate-950 p-2 shadow-2xl opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all">
                            <a href="{{ route('stories.mine') }}" class="block rounded-2xl px-4 py-2 text-sm text-slate-200 hover:bg-slate-800 hover:text-white">📚 Karyaku</a>
                            <a href="{{ route('profile.edit') }}" class="block rounded-2xl px-4 py-2 text-sm text-slate-200 hover:bg-slate-800 hover:text-white">⚙️ Pengaturan Akun</a>
                            <div class="my-2 h-px bg-slate-100"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full rounded-2xl px-4 py-2 text-left text-sm font-semibold text-rose-600 hover:bg-rose-50">🚪 Keluar</button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-10 max-w-6xl">
        @yield('content')
    </main>

    <footer class="bg-slate-950 text-slate-200 border-t border-slate-800">
        <div class="container mx-auto px-6 py-16 grid gap-10 lg:grid-cols-3 max-w-6xl">
            <div class="space-y-4">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3 text-xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-indigo-400 to-fuchsia-500">
                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-white/10">C</span>
                    CeritaKu.com
                </a>
                <p class="max-w-sm text-slate-400 leading-relaxed">CeritaKu adalah ruang untuk penulis amatir dan kreator cerita profesional. Bagikan imaji, cerita pendek, dan pengalaman dengan komunitas yang peduli.</p>
                <p class="text-sm text-slate-500">Bergabung sekarang dan mulai tulis kisahmu.</p>
            </div>

            <div>
                <h3 class="text-base font-semibold text-white mb-4">Quick Links</h3>
                <ul class="space-y-3 text-slate-400 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a></li>
                    <li><a href="{{ route('stories.create') }}" class="hover:text-white transition-colors">Tulis Cerita</a></li>
                    @auth
                        <li><a href="{{ route('stories.mine') }}" class="hover:text-white transition-colors">Karyaku</a></li>
                    @endauth
                    <li><a href="{{ route('login') }}" class="hover:text-white transition-colors">Masuk</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-base font-semibold text-white mb-4">Ikuti Kami</h3>
                <div class="flex flex-wrap gap-3">
                    <a href="#" class="inline-flex items-center gap-2 rounded-2xl border border-slate-700 bg-white/5 px-4 py-3 text-sm text-slate-300 hover:bg-white/10 transition-colors">Kontak</a>
                    <a href="#" class="inline-flex items-center gap-2 rounded-2xl border border-slate-700 bg-white/5 px-4 py-3 text-sm text-slate-300 hover:bg-white/10 transition-colors">Instagram</a>
                    <a href="#" class="inline-flex items-center gap-2 rounded-2xl border border-slate-700 bg-white/5 px-4 py-3 text-sm text-slate-300 hover:bg-white/10 transition-colors">Discord</a>
                </div>
                <p class="mt-6 text-sm text-slate-500">Butuh bantuan? Hubungi kami di <a href="mailto:halo@ceritaku.com" class="text-cyan-300 hover:text-cyan-200">halo@ceritaku.com</a></p>
            </div>
        </div>

        <div class="border-t border-slate-800 bg-slate-900/80">
            <div class="container mx-auto px-6 py-4 flex flex-col gap-3 md:flex-row md:items-center md:justify-between text-sm text-slate-500">
                <p>© 2026 CeritaKu.com. Semua hak dilindungi.</p>
                <div class="flex flex-wrap gap-4">
                    <a href="#" class="hover:text-white transition-colors">Syarat Layanan</a>
                    <a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-white transition-colors">Kontak</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
