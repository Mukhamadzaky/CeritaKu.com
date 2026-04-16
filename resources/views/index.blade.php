@extends('layout')

@section('content')
    <div class="mb-12 text-center relative overflow-hidden bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 rounded-[2rem] p-10 border border-white shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
        <span class="inline-block py-1 px-4 rounded-full bg-white text-indigo-600 font-bold text-sm mb-4 shadow-sm border border-indigo-100">✨ Jelajahi Dunia Imajinasi</span>
        <h1 class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-pink-500 mb-4 tracking-tight">CeritaKu.com</h1>
        <p class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">Baca karya terbaik, simak kabar terbaru, dan dukung penulis favoritmu dengan like serta komentar. Cerita terbaik akan muncul di peringkat utama.</p>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-6 py-4 rounded-2xl relative mb-8 flex items-center shadow-sm">
            <span class="text-2xl mr-3">🎉</span>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid gap-6 lg:grid-cols-3 mb-10">
        @foreach($news as $item)
            <div class="bg-white p-6 rounded-[1.75rem] border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
                <span class="text-xs uppercase tracking-[0.2em] text-indigo-600 font-bold">Berita</span>
                <h2 class="mt-4 text-xl font-semibold text-slate-900">{{ $item['title'] }}</h2>
                <p class="mt-3 text-slate-600 text-sm leading-relaxed">{{ $item['description'] }}</p>
            </div>
        @endforeach
    </div>

    <section class="mb-12">
        <div class="flex items-center justify-between mb-8 gap-4">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-900">Cerita Terbaik</h2>
                <p class="text-slate-500 mt-2">Tiga cerita dengan like terbanyak di CeritaKu.</p>
            </div>
            <a href="{{ route('stories.all') }}" class="text-indigo-600 font-semibold hover:underline">Lihat Semua Cerita</a>
        </div>

        <div class="grid gap-6 lg:grid-cols-3">
            @forelse($topStories as $story)
                <article class="group bg-white p-6 rounded-[1.75rem] border border-slate-200 shadow-sm hover:shadow-lg transition-all">
                    <div class="flex items-center gap-3 mb-5">
                        <img src="https://api.dicebear.com/7.x/adventurer/svg?seed={{ urlencode(optional($story->user)->name ?? 'Penulis') }}&backgroundColor=b6e3f4" class="w-12 h-12 rounded-2xl border border-slate-200 shadow-sm" alt="Avatar">
                        <div>
                            <p class="text-sm text-slate-500">{{ optional($story->user)->name ?? 'Penulis' }}</p>
                            <p class="text-xs uppercase tracking-[0.2em] text-slate-400">{{ $story->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4 line-clamp-2"><a href="{{ route('stories.show', $story->id) }}">{{ $story->title }}</a></h3>
                    <p class="text-slate-600 text-sm mb-6 line-clamp-3">{{ \Illuminate\Support\Str::limit($story->content, 120) }}</p>
                    <div class="flex items-center justify-between text-sm text-slate-500">
                        <span>👍 {{ $story->likes_count }} likes</span>
                        <span>💬 {{ $story->comments_count }} komentar</span>
                    </div>
                </article>
            @empty
                <p class="text-slate-500">Belum ada cerita terbaik saat ini.</p>
            @endforelse
        </div>
    </section>

    <section>
        <div class="flex items-center justify-between mb-8 gap-4">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-900">Kumpulan Cerita Terbaru</h2>
                <p class="text-slate-500 mt-2">Temukan cerita segar yang baru saja diunggah oleh penulis CeritaKu.</p>
            </div>
            <a href="{{ route('stories.all') }}" class="text-indigo-600 font-semibold hover:underline">Lihat Semua Cerita</a>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            @forelse($latestStories as $story)
                <article class="bg-white p-6 rounded-[1.75rem] border border-slate-200 shadow-sm hover:shadow-lg transition-all">
                    <div class="flex items-center justify-between mb-4 gap-3">
                        <div>
                            <p class="text-sm text-slate-500">{{ optional($story->user)->name ?? 'Penulis' }}</p>
                            <p class="text-xs text-slate-400">{{ $story->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="text-right text-slate-500 text-xs">
                            <p>👍 {{ $story->likes_count }}</p>
                            <p>💬 {{ $story->comments_count }}</p>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3 line-clamp-2"><a href="{{ route('stories.show', $story->id) }}">{{ $story->title }}</a></h3>
                    <p class="text-slate-600 text-sm leading-relaxed line-clamp-3">{{ \Illuminate\Support\Str::limit($story->content, 120) }}</p>
                </article>
            @empty
                <div class="bg-white p-8 rounded-[1.75rem] border border-slate-200 text-center">
                    <p class="text-slate-500">Belum ada cerita terbaru. Yuk, jadi penulis pertama!</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
