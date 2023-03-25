@extends('layouts.auth')

@section('content')
<div>
    <form action="/register" method="POST">
      @csrf
      <h1 class="auth-title">Registrasi</h1>
      <div class="form-input">
        <label class="auth-label" for="nama">Nama</label>
        <input type="text" name="nama" id="nama" class="auth-input">
      </div>
      <div class="form-input">
        <label class="auth-label" for="username">Username</label>
        <input type="text" name="username" id="username" class="auth-input">
      </div>
      <div class="form-input">
        <label class="auth-label" for="password">Password</label>
        <input type="password" name="password" id="password" class="auth-input">
      </div>
      <div class="form-input">
        <label class="auth-label" for="telp">Nomor Telepon</label>
        <input type="number" name="telp" id="telp" class="auth-input">
      </div>
      <div class="form-input">
        <label class="auth-label" for="nik">NIK</label>
        <input type="number" name="nik" id="nik" class="auth-input">
      </div>
      <button type="submit" class="auth-button">Register</button>
    </form>
    <p class="auth-sign">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
  </div>
@endsection
