@extends('layout')

@section('content')
    <div class="bg-white p-8 md:p-12 rounded-xl shadow-sm border border-gray-100">
        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">{{ $story->title }}</h1>
        <div class="flex items-center text-gray-500 mb-8 border-b pb-6">
            <span>Ditulis oleh <strong class="text-gray-800">{{ optional($story->user)->name ?? 'Penulis' }}</strong></span>
            <span class="mx-2">•</span>
            <span>{{ $story->created_at->format('d M Y') }}</span>
        </div>
        
        <div class="prose max-w-none text-gray-800 leading-relaxed whitespace-pre-wrap">
            {{ $story->content }}
        </div>

        <div class="mt-12 pt-6 border-t">
            <a href="{{ route('home') }}" class="text-indigo-600 hover:underline">&larr; Kembali ke Beranda</a>
        </div>
    </div>
@endsection