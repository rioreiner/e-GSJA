@extends('layouts.admin')

@section('title','Edit Jemaat')
@section('page-title','Edit Jemaat')
@section('breadcrumb','Jemaat')

@section('content')

<div class="max-w-5xl mx-auto">

    {{-- Header --}}
    <div class="bg-gradient-to-r from-amber-500 to-orange-500 rounded-3xl p-8 text-white mb-6">
        <div class="flex items-center gap-4">
            <div class="w-16 h-16 rounded-2xl bg-white/20 flex items-center justify-center">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
            </div>
            <div>
                <h2 class="text-3xl font-extrabold">
                    Edit Data Jemaat
                </h2>
                <p class="text-orange-100 mt-1">
                    Perbarui informasi jemaat gereja
                </p>
            </div>
        </div>
    </div>

    {{-- Form --}}
    <form action="{{ route('admin.jemaat.update', $jemaat->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="bg-white border border-slate-200 rounded-3xl overflow-hidden">

            {{-- Header Form --}}
            <div class="px-8 py-6 border-b border-slate-100">
                <h3 class="text-xl font-bold text-slate-800">
                    Form Edit Jemaat
                </h3>
                <p class="text-sm text-slate-500 mt-1">
                    Lengkapi data jemaat dengan benar
                </p>
            </div>

            {{-- Body --}}
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Nomor Anggota --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Nomor Anggota
                        </label>
                        <input type="text" value="{{ $jemaat->nomor_anggota }}" disabled class="w-full rounded-2xl border border-slate-200 bg-slate-100 px-5 py-3">
                    </div>

                    {{-- Nama --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Nama Lengkap
                        </label>
                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $jemaat->nama_lengkap) }}" class="w-full rounded-2xl border border-slate-300 px-5 py-3 focus:ring-2 focus:ring-brand-500 focus:border-brand-500">
                        @error('nama_lengkap')
                            <p class="text-rose-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Jenis Kelamin
                        </label>
                        <select name="jenis_kelamin" class="w-full rounded-2xl border border-slate-300 px-5 py-3">
                            <option value="">Pilih</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin', $jemaat->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin', $jemaat->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Tanggal Lahir
                        </label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $jemaat->tanggal_lahir?->format('Y-m-d')) }}" class="w-full rounded-2xl border border-slate-300 px-5 py-3">
                    </div>

                    {{-- No HP --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Nomor Telepon
                        </label>
                        <input type="text" name="no_telepon" value="{{ old('no_telepon', $jemaat->no_telepon) }}" class="w-full rounded-2xl border border-slate-300 px-5 py-3">
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Email
                        </label>
                        <input type="email" name="email" value="{{ old('email', $jemaat->email) }}" class="w-full rounded-2xl border border-slate-300 px-5 py-3">
                    </div>

                    {{-- Status Pernikahan --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Status Pernikahan
                        </label>
                        <select name="status_pernikahan" class="w-full rounded-2xl border border-slate-300 px-5 py-3">
                            @foreach(['Belum Menikah','Menikah','Cerai','Janda','Duda'] as $status)
                                <option value="{{ $status }}" {{ old('status_pernikahan', $jemaat->status_pernikahan) == $status ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Status Keanggotaan --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Status Keanggotaan
                        </label>
                        <select name="status_keanggotaan" class="w-full rounded-2xl border border-slate-300 px-5 py-3">
                            @foreach(['Aktif','Tidak Aktif','Pindah','Meninggal'] as $status)
                                <option value="{{ $status }}" {{ old('status_keanggotaan', $jemaat->status_keanggotaan) == $status ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Alamat --}}
                <div class="mt-6">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Alamat
                    </label>
                    <textarea name="alamat" rows="4" class="w-full rounded-2xl border border-slate-300 px-5 py-3">{{ old('alamat', $jemaat->alamat) }}</textarea>
                </div>

                {{-- FOTO JEMAAT (SINKRONISASI JALUR FOLDER & TAMPILAN PREVIEW) --}}
                <div class="mt-6 p-6 border border-slate-200 bg-slate-50 rounded-2xl">
                    <label class="block text-sm font-bold text-slate-800 mb-3">
                        Foto Jemaat
                    </label>
                    
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6">
                        <div class="flex-shrink-0">
                            <p class="text-xs text-slate-400 mb-1.5 font-medium">Foto Saat Ini:</p>
                            <img src="{{ !empty($jemaat->foto) ? asset('uploads/jemaat/' . $jemaat->foto) : asset('images/default-avatar.png') }}"
                                 alt="Current Photo"
                                 class="w-24 h-24 object-cover rounded-2xl border-2 border-white shadow-md bg-white">
                        </div>
                        
                        <div class="flex-1 w-full">
                            <p class="text-xs text-slate-400 mb-1.5 font-medium">Unggah Foto Baru:</p>
                            <input type="file" name="foto" accept="image/*" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm">
                            <p class="text-xs text-slate-400 mt-2">
                                *Kosongkan jika tidak ingin mengganti foto profil.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Footer Form --}}
            <div class="px-8 py-6 bg-slate-50 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.jemaat.show', $jemaat->id) }}" class="px-5 py-3 rounded-2xl bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-3 rounded-2xl bg-amber-500 hover:bg-amber-600 text-white font-bold transition shadow-lg shadow-amber-500/20">
                    Update Jemaat
                </button>
            </div>

        </div>
    </form>

</div>

@endsection