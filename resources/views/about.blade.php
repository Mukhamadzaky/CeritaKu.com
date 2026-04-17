@extends('layout')

@section('content')
    <div class="space-y-6">
        <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
            <div class="max-w-3xl">
                <h1 class="text-4xl font-extrabold text-slate-900 mb-4">Tentang CeritaKu.com</h1>
                <p class="text-slate-600 text-lg leading-relaxed">CeritaKu.com adalah platform komunitas untuk penulis dan pembaca yang ingin berbagi cerita, inspirasi, dan ide kreatif. Kami percaya bahwa setiap cerita pantas didengar, apapun bentuknya: fiksi, pengalaman pribadi, atau puisi singkat.</p>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            <div class="bg-slate-950/95 text-slate-100 p-8 rounded-[2rem] border border-slate-800 shadow-xl">
                <h2 class="text-2xl font-semibold mb-4">Misi Kami</h2>
                <p class="leading-relaxed text-slate-300">Menciptakan ruang aman bagi penulis amatir dan profesional untuk menunjukkan karya mereka, terhubung dengan pembaca, dan tumbuh sebagai komunitas kreatif. Kami ingin setiap pengguna merasa terinspirasi untuk terus menulis dan membagikan cerita mereka.</p>
            </div>
            <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
                <h2 class="text-2xl font-semibold mb-4">Apa yang Kami Tawarkan</h2>
                <ul class="space-y-3 text-slate-600">
                    <li>• Platform sederhana untuk mengunggah cerita.</li>
                    <li>• Sistem like dan komentar untuk interaksi komunitas.</li>
                    <li>• Halaman profil penulis untuk membangun pengikut.</li>
                    <li>• Tampilan cerita yang bersih dan responsif.</li>
                </ul>
            </div>
        </div>

        <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
            <h2 class="text-2xl font-semibold mb-4">Nilai Kami</h2>
            <div class="grid gap-4 md:grid-cols-3">
                <div class="rounded-3xl bg-slate-50 p-6 border border-slate-200">
                    <h3 class="font-semibold text-slate-900 mb-2">Kreativitas</h3>
                    <p class="text-slate-600">Kami mendukung ide-ide orisinal dan ekspresi bebas dalam bentuk tulisan.</p>
                </div>
                <div class="rounded-3xl bg-slate-50 p-6 border border-slate-200">
                    <h3 class="font-semibold text-slate-900 mb-2">Komunitas</h3>
                    <p class="text-slate-600">Setiap cerita dirancang untuk terhubung dengan pembaca dan membangun dukungan.</p>
                </div>
                <div class="rounded-3xl bg-slate-50 p-6 border border-slate-200">
                    <h3 class="font-semibold text-slate-900 mb-2">Keaslian</h3>
                    <p class="text-slate-600">Kami menghargai suara asli dan cerita yang datang dari pengalaman nyata atau imajinasi murni.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
