@extends('layout')

@section('content')
    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-6 py-4 rounded-2xl mb-8 shadow-sm">
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white p-8 md:p-12 rounded-3xl shadow-sm border border-slate-200">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.25em] text-indigo-600 font-bold mb-3">Cerita</p>
                <h1 class="text-4xl font-extrabold text-slate-900">{{ $story->title }}</h1>
                <div class="mt-4 flex flex-wrap items-center gap-3 text-slate-500 text-sm">
                    <span>Ditulis oleh <strong class="text-slate-900">{{ optional($story->user)->name ?? 'Penulis' }}</strong></span>
                    <span>•</span>
                    <span>{{ $story->created_at->format('d M Y') }}</span>
                    <span>•</span>
                    <span>👍 {{ $story->likes_count }} Like</span>
                    <span>•</span>
                    <span>💬 {{ $story->comments_count }} Komentar</span>
                </div>
            </div>
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                @auth
                    <form method="POST" action="{{ route('stories.like', $story->id) }}">
                        @csrf
                        <button type="submit" class="inline-flex items-center gap-2 rounded-full px-5 py-3 font-semibold transition-all {{ $liked ? 'bg-rose-600 text-white hover:bg-rose-700' : 'bg-indigo-600 text-white hover:bg-indigo-700' }}">
                            <span class="text-xl">{{ $liked ? '❤️' : '🤍' }}</span>
                            {{ $liked ? 'Sudah Love' : 'Love Cerita' }}
                        </button>
                    </form>
                @else
                    <a href="{{ route('login', ['redirect' => route('stories.show', $story->id)]) }}" class="inline-flex items-center gap-2 rounded-full px-5 py-3 bg-indigo-600 text-white font-semibold hover:bg-indigo-700 transition-all">
                        <span class="text-xl">🤍</span>
                        Login untuk Love
                    </a>
                @endauth
                <a href="{{ route('stories.all') }}" class="inline-flex items-center gap-2 rounded-full px-5 py-3 border border-slate-200 text-slate-700 hover:bg-slate-100 transition-all">Semua Cerita</a>
            </div>
        </div>

        <div class="prose max-w-none text-slate-800 leading-relaxed whitespace-pre-wrap mt-10">
            {{ $story->content }}
        </div>
    </div>

    <div class="mt-10 grid gap-10 lg:grid-cols-[1.5fr_0.9fr]">
        <div class="space-y-8">
            <section class="bg-white p-8 rounded-[1.75rem] border border-slate-200 shadow-sm">
                <h2 class="text-2xl font-bold text-slate-900 mb-4">Komentar</h2>

                @auth
                    <form method="POST" action="{{ route('stories.comment', $story->id) }}" class="space-y-4">
                        @csrf
                        <textarea name="content" rows="4" class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-5 py-4 text-slate-900 focus:border-indigo-500 focus:outline-none" placeholder="Tulis komentar kamu..." required>{{ old('content') }}</textarea>
                        <button type="submit" class="inline-flex items-center gap-2 rounded-full bg-indigo-600 text-white px-5 py-3 font-semibold hover:bg-indigo-700 transition-all">Kirim Komentar</button>
                    </form>
                @else
                    <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6 text-center">
                        <p class="text-slate-600 mb-4">Login untuk membuat komentar dan mendukung cerita ini.</p>
                        <a href="{{ route('login', ['redirect' => route('stories.show', $story->id)]) }}" class="inline-flex rounded-full bg-indigo-600 text-white px-5 py-3 font-semibold hover:bg-indigo-700 transition-all">Login Sekarang</a>
                    </div>
                @endauth

                <div class="space-y-4">
                    @forelse($story->comments as $comment)
                        <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                            <div class="flex items-center justify-between gap-3 mb-3 text-slate-600">
                                <div>
                                    <p class="font-semibold text-slate-900">{{ optional($comment->user)->name ?? 'Pengguna' }}</p>
                                    <p class="text-xs">{{ $comment->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <p class="text-slate-700 leading-relaxed">{{ $comment->content }}</p>
                        </div>
                    @empty
                        <p class="text-slate-500">Belum ada komentar. Jadilah yang pertama meninggalkan dukungan!</p>
                    @endforelse
                </div>
            </section>
        </div>

        <aside class="space-y-6">
            <div class="bg-white p-8 rounded-[1.75rem] border border-slate-200 shadow-sm">
                <h3 class="text-xl font-bold text-slate-900 mb-3">Info</h3>
                <p class="text-slate-600 leading-relaxed">Cerita dengan like terbanyak akan terus naik ke peringkat teratas. Beri like dan komentar untuk karya yang menurutmu paling inspiratif.</p>
            </div>
        </aside>
    </div>
@endsection
