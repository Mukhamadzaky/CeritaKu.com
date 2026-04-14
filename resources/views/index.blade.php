@extends('layout')

@section('content')
    <div class="mb-8 text-center">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-2">Selamat Datang di CeritaKu.com</h1>
        <p class="text-gray-600">Baca karya terbaik atau bagikan imajinasimu kepada dunia.</p>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($stories as $story)
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition">
                <h2 class="text-xl font-bold text-gray-800 mb-2">
                    <a href="{{ route('stories.show', $story->id) }}" class="hover:text-indigo-600">{{ $story->title }}</a>
                </h2>
                <p class="text-sm text-gray-500 mb-4">Oleh: <span class="font-semibold text-gray-700">{{ $story->author }}</span> • {{ $story->created_at->diffForHumans() }}</p>
                <p class="text-gray-600 mb-4">{{ Str::limit($story->content, 120) }}</p>
                <a href="{{ route('stories.show', $story->id) }}" class="text-indigo-600 font-medium hover:underline">Baca selengkapnya &rarr;</a>
            </div>
        @empty
            <div class="col-span-2 text-center py-10 bg-white rounded-xl border border-dashed border-gray-300">
                <p class="text-gray-500">Belum ada cerita. Jadilah yang pertama menulis!</p>
            </div>
        @endforelse
    </div>
@endsection