@extends('layout')

@section('content')
    <div class="mb-12 text-center relative overflow-hidden bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 rounded-[2rem] p-10 border border-white shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
        <span class="inline-block py-1 px-4 rounded-full bg-white text-indigo-600 font-bold text-sm mb-4 shadow-sm border border-indigo-100">✨ Jelajahi Dunia Imajinasi</span>
        <h1 class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-pink-500 mb-4 tracking-tight">
            CeritaKu.com
        </h1>
        <p class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
            Baca karya terbaik atau bagikan ceritamu sendiri ke seluruh dunia. Mari mulai petualangan seru hari ini! 🚀
        </p>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-6 py-4 rounded-2xl relative mb-8 flex items-center shadow-sm">
            <span class="text-2xl mr-3">🎉</span>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @forelse($stories as $story)
            <div class="group bg-white p-7 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-50 hover:border-indigo-100 hover:shadow-[0_8px_30px_rgb(99,102,241,0.12)] transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between">
                
                <div>
                    <div class="flex items-center gap-3 mb-5">
                        <img src="https://api.dicebear.com/7.x/adventurer/svg?seed={{ urlencode(optional($story->user)->name ?? 'Penulis') }}&backgroundColor=b6e3f4,c0aede,d1d4f9,ffdfbf,ffd5dc" 
                             alt="Avatar" 
                             class="w-11 h-11 rounded-full border-2 border-white shadow-sm bg-gray-100">
                        <div>
                            <p class="text-sm font-bold text-gray-800">{{ optional($story->user)->name ?? 'Penulis' }}</p>
                            <p class="text-xs text-gray-400 font-medium">{{ $story->created_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    <h2 class="text-xl font-extrabold text-gray-800 mb-3 group-hover:text-indigo-600 transition-colors line-clamp-2">
                        <a href="{{ route('stories.show', $story->id) }}">{{ $story->title }}</a>
                    </h2>
                    <p class="text-gray-600 mb-6 text-sm leading-relaxed line-clamp-3">
                        {{ \Illuminate\Support\Str::limit($story->content, 120) }}
                    </p>
                </div>

                <div class="pt-4 border-t border-gray-50 mt-auto flex items-center justify-between">
                    <a href="{{ route('stories.show', $story->id) }}" class="text-indigo-600 font-bold text-sm inline-flex items-center gap-1 group-hover:gap-2 transition-all">
                        Baca ceritanya <span class="text-lg leading-none">&rarr;</span>
                    </a>
                    <span class="text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform group-hover:rotate-12">📖</span>
                </div>

            </div>
        @empty
            <div class="col-span-1 md:col-span-2 text-center py-16 px-6 bg-gradient-to-br from-white to-indigo-50/50 rounded-[2rem] border-2 border-dashed border-indigo-200">
                <div class="text-6xl mb-4 animate-bounce">✍️</div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Wah, halamannya masih sepi!</h3>
                <p class="text-gray-500 mb-6 max-w-md mx-auto">Belum ada cerita yang diunggah. Yuk, jadilah penulis pertama dan bagikan imajinasi liarmu di sini.</p>
                <a href="{{ route('stories.create') }}" class="inline-flex shadow-lg shadow-indigo-200 items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-full transition-all hover:-translate-y-0.5">
                    Mulai Menulis 🚀
                </a>
            </div>
        @endforelse
    </div>
@endsection