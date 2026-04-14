@extends('layout')

@section('content')
<div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm mb-8 flex items-center gap-6">
    <img src="https://api.dicebear.com/7.x/adventurer/svg?seed={{ urlencode(auth()->user()->name) }}&backgroundColor=b6e3f4" class="w-24 h-24 rounded-full border-4 border-indigo-50">
    <div>
        <h1 class="text-3xl font-extrabold text-gray-900">{{ auth()->user()->name }}</h1>
        <p class="text-gray-500 mt-1">{{ auth()->user()->email }} • Bergabung {{ auth()->user()->created_at->format('M Y') }}</p>
    </div>
</div>

<h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-4">Koleksi Ceritaku</h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @forelse($stories as $story)
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $story->title }}</h3>
            <p class="text-sm text-gray-500 mb-4">Diterbitkan: {{ $story->created_at->format('d M Y') }}</p>
            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ \Illuminate\Support\Str::limit($story->content, 100) }}</p>
            <a href="{{ route('stories.show', $story->id) }}" class="text-indigo-600 text-sm font-bold hover:underline">Lihat Karya</a>
        </div>
    @empty
        <div class="col-span-2 text-center py-10">
            <p class="text-gray-500 mb-4">Kamu belum menulis karya apapun.</p>
            <a href="{{ route('stories.create') }}" class="bg-indigo-600 text-white px-6 py-2 rounded-full font-bold">Tulis Sekarang</a>
        </div>
    @endforelse
</div>
@endsection