@extends('layout')

@section('content')
    <div class="space-y-6">
        <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
            <h1 class="text-4xl font-extrabold text-slate-900 mb-4">Frequently Asked Questions</h1>
            <p class="text-slate-600 text-lg leading-relaxed">Temukan jawaban atas pertanyaan umum tentang cara menggunakan CeritaKu, menulis cerita, dan berinteraksi dengan komunitas.</p>
        </div>

        <div class="grid gap-6">
            <div class="bg-slate-950/95 text-slate-100 p-8 rounded-[2rem] border border-slate-800 shadow-xl">
                <h2 class="text-2xl font-semibold mb-4">Bagaimana cara membuat akun?</h2>
                <p class="leading-relaxed text-slate-300">Klik tombol Daftar Akun di header, isi informasi yang dibutuhkan, lalu konfirmasikan email jika diminta. Setelah itu kamu bisa mulai menulis dan berinteraksi.</p>
            </div>
            <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
                <h2 class="text-2xl font-semibold mb-4">Bagaimana cara menulis cerita?</h2>
                <p class="text-slate-600 leading-relaxed">Masuk ke akunmu, lalu pilih tombol Tulis Cerita. Isi judul dan isi cerita, lalu pilih Submit untuk mempublikasikan cerita ke halaman utama.</p>
            </div>
            <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
                <h2 class="text-2xl font-semibold mb-4">Bisakah saya mengedit cerita setelah dipublikasikan?</h2>
                <p class="text-slate-600 leading-relaxed">Saat ini cerita disimpan sebagai unggahan statis. Untuk memperbarui cerita, kamu bisa menghapusnya dan membuat ulang dengan versi terbaru.</p>
            </div>
            <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
                <h2 class="text-2xl font-semibold mb-4">Bagaimana cara berinteraksi dengan cerita lain?</h2>
                <p class="text-slate-600 leading-relaxed">Di halaman detail cerita, gunakan tombol Like dan kolom komentar untuk memberikan dukungan dan tanggapan kepada penulis.</p>
            </div>
            <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
                <h2 class="text-2xl font-semibold mb-4">Apa saja kategori cerita yang tersedia?</h2>
                <p class="text-slate-600 leading-relaxed">CeritaKu mendukung semua jenis cerita, mulai dari fiksi pendek hingga pengalaman pribadi. Cukup tulis sesuai gaya kamu.</p>
            </div>
        </div>
    </div>
@endsection
