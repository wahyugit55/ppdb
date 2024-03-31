{{-- resources/views/siswa/login.blade.php --}}

@extends('layouts.app')

@section('title', 'Login Siswa')

@section('content')
<div class="container">
    <h2>Login Siswa</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label>NISN</label>
            <input type="text" name="nisn" required>
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</div>
@endsection
