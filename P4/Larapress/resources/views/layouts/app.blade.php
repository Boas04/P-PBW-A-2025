<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Post Baru') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('posts.store') }}">
                    @csrf

                    <!-- Judul -->
                    <div class="mb-5">
                        <label for="title" class="block text-gray-700 font-semibold mb-1">Judul</label>
                        <input type="text" name="title" id="title"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Masukkan judul postingan..." required>
                    </div>

                    <!-- Isi -->
                    <div class="mb-5">
                        <label for="content" class="block text-gray-700 font-semibold mb-1">Isi</label>
                        <textarea name="content" id="content" rows="5"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Tulis isi postingan di sini..." required></textarea>
                    </div>

                    <!-- Tombol -->
                    <div class="flex justify-end">
                        <a href="{{ url('/dashboard') }}"
                            class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400 transition mr-2">
                            Batal
                        </a>
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
