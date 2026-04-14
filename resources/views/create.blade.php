@extends('layout')

@section('content')
    <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-4">Tulis Karya Baru</h2>

        <form action="{{ route('stories.store') }}" method="POST">
            @csrf
            <div class="mb-5">
                <label class="block text-gray-700 font-medium mb-2">Judul Cerita</label>
                <input type="text" name="title" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-indigo-500" placeholder="Masukkan judul yang menarik...">
            </div>

            <div class="mb-5">
                <label class="block text-gray-700 font-medium mb-2">Nama Penulis</label>
                <input type="text" name="author" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-indigo-500" placeholder="Nama asli atau nama pena Anda">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Isi Cerita</label>
                <textarea name="content" rows="12" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-indigo-500" placeholder="Mulai ketik cerita Anda di sini..."></textarea>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('home') }}" class="px-6 py-2 text-gray-500 hover:text-gray-700 mr-4">Batal</a>
                <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition font-medium">Unggah Cerita</button>
            </div>
        </form>
    </div>
@endsection