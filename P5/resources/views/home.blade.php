@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen">
    <div class="max-w-6xl mx-auto px-6 py-16 text-center">
        <!-- Hero Section -->
        <h1 class="text-4xl md:text-5xl font-extrabold text-blue-700 mb-4">
            Selamat Datang di Website SMP Mentari Ceria 🌞
        </h1>
        <p class="text-gray-700 text-lg md:text-xl mb-8">
            Sekolah yang ceria, berprestasi, dan berkarakter.
        </p>

        <a href="{{ url('/bukutamu') }}"
           class="bg-blue-600 text-white font-semibold px-6 py-3 rounded-full shadow hover:bg-blue-700 transition">
           ✍️ Tinggalkan Pesan di Buku Tamu
        </a>
    </div>

    <!-- Kegiatan Section -->
    <section class="max-w-6xl mx-auto px-6 py-12">
        <h2 class="text-2xl font-bold text-blue-700 mb-6 text-center">Kegiatan Terbaru</h2>

        <div class="grid md:grid-cols-3 sm:grid-cols-2 gap-6">
            <!-- Card Kegiatan -->
            <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold mb-2 text-blue-700">Upacara Hari Senin</h3>
                <p class="text-gray-600 text-sm">SMP Mentari Ceria rutin melaksanakan upacara setiap hari Senin
                    untuk menanamkan kedisiplinan dan semangat nasionalisme.</p>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold mb-2 text-blue-700">Lomba Sains Antar Sekolah</h3>
                <p class="text-gray-600 text-sm">Siswa-siswi berpartisipasi dalam lomba sains tingkat kota dan
                    berhasil meraih juara harapan 1.</p>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold mb-2 text-blue-700">Program Literasi Pagi</h3>
                <p class="text-gray-600 text-sm">Kegiatan membaca buku setiap pagi selama 15 menit untuk
                    menumbuhkan minat baca siswa.</p>
            </div>
        </div>
    </section>
</div>
@endsection
