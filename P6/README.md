# Laporan Praktikum PBW: CRUD Laravel + Filament (SMP Mentari)

[cite_start]Proyek ini adalah aplikasi web sederhana untuk manajemen data sekolah (Siswa dan Kegiatan) yang dibangun untuk memenuhi tugas praktikum Mata Kuliah Pengembangan Berbasis Web[cite: 2].

[cite_start]Aplikasi ini menggunakan **Laravel 12** sebagai backend dan **Filament v4** untuk menghasilkan panel admin CRUD (Create, Read, Update, Delete) secara cepat[cite: 1, 8].

## Identitas Mahasiswa

- **Nama:** `Abner Boas Paskah Parningotan Gultom`
- **NPM:** `4523210002`
- **Mata Kuliah:** Pemrograman Berbasis Web (PBW)
- **Dosen:** `Adi Wahyu Pribadi, S.Si., M.Kom`

---

## Dokumentasi & Screenshot Aplikasi

Berikut adalah penjelasan singkat untuk setiap bagian utama dari panel admin.

### 1. Menu Login
[cite_start]Halaman login ini di-generate otomatis oleh Filament saat instalasi (`php artisan filament:install --panels`)[cite: 31]. [cite_start]Admin dapat masuk menggunakan akun yang telah dibuat melalui perintah `php artisan make:filament-user`[cite: 34].
<img width="1920" height="1080" alt="Screenshot 2025-10-24 123143" src="https://github.com/user-attachments/assets/b398adfa-ac7c-4f02-8252-52467613469f" />



---

### 2. Dashboard
Setelah berhasil login, admin akan diarahkan ke halaman Dashboard utama. [cite_start]Halaman ini menampilkan menu navigasi untuk "Siswa" dan "Kegiatan" yang telah dikelompokkan ke dalam grup "Akademik" dan "Publikasi" sesuai kustomisasi `AdminPanelProvider.php` [cite: 327, 329-331].

<img width="1920" height="1080" alt="Screenshot 2025-10-24 123125" src="https://github.com/user-attachments/assets/d96f9c70-0225-4c92-b2da-79122b97ab9a" />


---

### 3. Bagian Siswa
[cite_start]Halaman ini (`ListSiswas`) menampilkan data siswa yang ada di database dalam bentuk tabel[cite: 278]. [cite_start]Halaman ini dibuat oleh `SiswaResource`[cite: 74, 78]. [cite_start]Fitur yang tersedia meliputi pencarian (NISN, Nama)[cite: 259, 262], sorting, dan tombol "Create" untuk menambah data baru.

<img width="1920" height="1080" alt="Screenshot 2025-10-24 123115" src="https://github.com/user-attachments/assets/40131519-7a33-4a69-94e4-57add83cbe76" />


---

### 4. Menambahkan Siswa
Ini adalah form (`CreateSiswa`) untuk menambah data siswa baru. [cite_start]Form ini didefinisikan dalam `SiswaForm` [cite: 214, 290] [cite_start]dan berisi input untuk NISN, Nama, Jenis Kelamin, Kelas, Tanggal Lahir, dan Alamat, sesuai dengan skema migrasi database [cite: 61-66].

<img width="1920" height="1080" alt="Screenshot 2025-10-24 122929" src="https://github.com/user-attachments/assets/46428e30-8daf-44a5-b0aa-202514d8fa07" />


---

### 5. Bagian Kegiatan
[cite_start]Halaman ini (`ListKegiatans`) menampilkan daftar semua kegiatan sekolah [cite: 109-110]. [cite_start]Data yang ditampilkan mencakup Foto, Judul, Tanggal, dan Ringkasan [cite: 167-186]. [cite_start]Halaman ini juga dilengkapi fitur filter berdasarkan tahun [cite: 193-194].

<img width="1920" height="1080" alt="Screenshot 2025-10-24 122715" src="https://github.com/user-attachments/assets/387d1655-264f-4d85-a440-7ea29bf0cb5a" />


---

### 6. Menambahkan Kegiatan
Form ini (`CreateKegiatan`) digunakan untuk mempublikasikan kegiatan baru. [cite_start]Form ini didefinisikan dalam `KegiatanForm` [cite: 119, 124] [cite_start]dan berisi input untuk Judul, Tanggal, Ringkasan, Isi (menggunakan `Textarea` atau `RichEditor`), dan `FileUpload` untuk foto [cite: 129-152].

<img width="1918" height="598" alt="Screenshot 2025-10-24 121922" src="https://github.com/user-attachments/assets/e623b54f-efcd-4265-9563-ece8c4711b43" />
