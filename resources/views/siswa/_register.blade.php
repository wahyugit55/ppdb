{{-- resources/views/siswa/register.blade.php --}}

@extends('layouts.app')

@section('title', 'Register Siswa')

@section('content')
<div class="container">
    <h2>Form Registrasi Siswa</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label>NISN</label>
            <input type="text" name="nisn" required>
        </div>
        <div>
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" required>
        </div>
        <div>
            <label>Jenis Sekolah</label>
            <input type="text" name="jenis_sekolah" required>
        </div>
        <div>
            <label>Asal Sekolah</label>
            <input type="text" name="asal_sekolah" required>
        </div>
        <div>
            <label>Nomor HP</label>
            <input type="text" name="nomor_hp" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required minlength="6">
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>
        
        <div>
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required minlength="6">
        </div>
        <div>
            <button type="submit">Daftar</button>
        </div>
    </form>
</div>
@endsection
