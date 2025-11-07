<?php
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome'); // <-- BARIS INI PENTING

Route::get('/kegiatan', function () {
    return view('kegiatan-public', [
        'items' => Kegiatan::latest()->paginate(9),
    ]);
});