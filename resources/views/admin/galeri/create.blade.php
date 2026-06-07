@extends('layouts.admin')

@section('title', 'Tambah Foto Galeri')
@section('page-title', 'Tambah Foto Galeri')
@section('breadcrumb', 'Tambah')

@section('content')
<div class="max-w-4xl mx-auto">

    {{-- Header --}}
    <div class="mb-6">
        <a href="{{ route('admin.galeri.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-brand-600 transition mb-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke Data Galeri
        </a>
        <h2 class="text-2xl font-bold text-slate-900">Tambah Foto Baru</h2>
        <p class="text-sm text-slate-500 mt-1">Isi formulir di bawah ini untuk menambahkan dokumentasi kegiatan baru ke galeri.</p>
    </div>

    {{-- Form Card --}}
    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                {{-- Sisi Kiri: Input Teks --}}
                <div class="space-y-5">
                    {{-- Judul Foto --}}
                    <div>
                        <label for="judul" class="block text-sm font-semibold text-slate-700 mb-2">Judul Foto / Kegiatan <span class="text-rose-500">*</span></label>
                        <input type="text" name="judul" id="judul" value="{{ old('judul') }}" 
                               class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition @error('judul') border-rose-500 @enderror"
                               placeholder="Masukkan judul foto atau nama kegiatan...">
                        @error('judul')
                            <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kategori --}}
                    <div>
                        <label for="kategori" class="block text-sm font-semibold text-slate-700 mb-2">Kategori <span class="text-slate-400 text-xs">(Opsional)</span></label>
                        <select name="kategori" id="kategori" 
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition">
                            <option value="Umum" {{ old('kategori') == 'Umum' ? 'selected' : '' }}>Umum / Kegiatan</option>
                            <option value="Ibadah" {{ old('kategori') == 'Ibadah' ? 'selected' : '' }}>Ibadah Utama</option>
                            <option value="Pemuda" {{ old('kategori') == 'Pemuda' ? 'selected' : '' }}>Pemuda & Remaja</option>
                            <option value="Natal" {{ old('kategori') == 'Natal' ? 'selected' : '' }}>Perayaan Natal</option>
                            <option value="Sosial" {{ old('kategori') == 'Sosial' ? 'selected' : '' }}>Aksi Sosial</option>
                        </select>
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label for="deskripsi" class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Singkat <span class="text-slate-400 text-xs">(Opsional)</span></label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" 
                                  class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition"
                                  placeholder="Tuliskan cerita singkat tentang foto ini...">{{ old('deskripsi') }}</textarea>
                    </div>
                </div>

                {{-- Sisi Kanan: Upload & Preview Gambar --}}
                <div class="flex flex-col">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">File Foto <span class="text-rose-500">*</span></label>
                    
                    <div class="flex-1 flex flex-col justify-center items-center border-2 border-dashed border-slate-200 rounded-2xl p-6 bg-slate-50 hover:bg-slate-100/50 transition relative group cursor-pointer">
                        <input type="file" name="foto" id="foto" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer z-10" onchange="previewImage(this)">
                        
                        {{-- Keadaan Sebelum Pilih Gambar --}}
                        <div id="upload-placeholder" class="text-center space-y-2">
                            <div class="w-12 h-12 rounded-xl bg-white border border-slate-200 flex items-center justify-center mx-auto shadow-sm text-slate-400 group-hover:text-brand-500 transition">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div class="text-sm font-medium text-slate-600">Klik atau seret file ke sini</div>
                            <div class="text-xs text-slate-400">PNG, JPG, JPEG (Maks. 2MB)</div>
                        </div>

                        {{-- Keadaan Setelah Pilih Gambar (Preview) --}}
                        <div id="image-preview-container" class="hidden w-full h-full min-h-[200px] rounded-xl overflow-hidden relative">
                            <img id="image-preview" src="#" alt="Preview" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition pointer-events-none">
                                <span class="text-xs font-semibold text-white bg-slate-900/80 px-3 py-1.5 rounded-lg shadow">Ganti Foto</span>
                            </div>
                        </div>
                    </div>
                    @error('foto')
                        <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                    @enderror

                    {{-- Switch/Checkbox Status Utama --}}
                    <div class="mt-5 p-4 bg-slate-50 border border-slate-100 rounded-xl flex items-center justify-between">
                        <div>
                            <label for="is_utama" class="text-sm font-semibold text-slate-800 cursor-pointer">Jadikan Foto Utama</label>
                            <p class="text-xs text-slate-400 mt-0.5">Tampilkan foto ini di bagian depan/banner beranda utama.</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_utama" id="is_utama" value="1" class="sr-only peer" {{ old('is_utama') ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-brand-600"></div>
                        </label>
                    </div>
                </div>

            </div>

            <hr class="border-slate-100">

            {{-- Action Buttons --}}
            <div class="flex justify-end items-center gap-3">
                <a href="{{ route('admin.galeri.index') }}" 
                   class="px-5 py-2.5 rounded-xl border border-slate-200 text-sm font-semibold text-slate-600 hover:bg-slate-50 transition">
                    Batal
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 rounded-xl bg-brand-600 hover:bg-brand-700 text-white text-sm font-semibold transition shadow-md shadow-brand-600/10">
                    Simpan Foto
                </button>
            </div>

        </form>
    </div>
</div>

{{-- JavaScript untuk Preview Gambar secara Real-time --}}
<script>
    function previewImage(input) {
        const placeholder = document.getElementById('upload-placeholder');
        const previewContainer = document.getElementById('image-preview-container');
        const previewImg = document.getElementById('image-preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImg.src = e.target.result;
                placeholder.classList.add('hidden');
                previewContainer.classList.remove('hidden');
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            previewImg.src = "#";
            placeholder.classList.remove('hidden');
            previewContainer.classList.add('hidden');
        }
    }
</script>
@endsection