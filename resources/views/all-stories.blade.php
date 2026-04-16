@extends('layout')

@section('content')
    <div class="mb-10">
        <div class="max-w-3xl">
            <h1 class="text-4xl font-extrabold text-slate-900 mb-4">Semua Cerita</h1>
            <p class="text-slate-500 leading-relaxed">Temukan semua karya terbaik dari penulis CeritaKu. Baca cerita, beri like, dan tinggalkan komentar untuk mendukung penulis favoritmu.</p>
        </div>
    </div>

    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @forelse($stories as $story)
            <article class="bg-white p-6 rounded-[1.75rem] border border-slate-200 shadow-sm hover:shadow-lg transition-all">
                <div class="flex items-center justify-between mb-4 gap-4">
                    <div>
                        <p class="text-sm text-slate-500">{{ optional($story->user)->name ?? 'Penulis' }}</p>
                        <p class="text-xs text-slate-400">{{ $story->created_at->format('d M Y') }}</p>
                    </div>
                    <div class="text-right text-slate-500 text-xs">
                        <p>👍 {{ $story->likes_count }}</p>
                        <p>💬 {{ $story->comments_count }}</p>
                    </div>
                </div>
                <h2 class="text-2xl font-bold text-slate-900 mb-3 line-clamp-2"><a href="{{ route('stories.show', $story->id) }}">{{ $story->title }}</a></h2>
                <p class="text-slate-600 text-sm leading-relaxed line-clamp-4 mb-5">{{ \Illuminate\Support\Str::limit($story->content, 120) }}</p>
                <a href="{{ route('stories.show', $story->id) }}" class="inline-flex items-center gap-2 text-indigo-600 font-semibold hover:text-indigo-800">Baca selengkapnya<span>&rarr;</span></a>
            </article>
        @empty
            <div class="col-span-full bg-white p-10 rounded-[1.75rem] border border-slate-200 text-center">
                <p class="text-slate-500">Belum ada cerita untuk ditampilkan. Yuk, tambahkan ceritamu sekarang!</p>
                <a href="{{ route('stories.create') }}" class="mt-6 inline-flex bg-indigo-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-indigo-700 transition-all">Tulis Cerita</a>
            </div>
        @endforelse
    </div>
@endsection
