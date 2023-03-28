@extends('layouts.auth')

@section('content')
        <div class="row justify-content-center">
            <div class="col-md-5">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session ('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="container mt-4">
                    <main class="form-login">
                        <form action="/register" method="POST">
                            @csrf
                            <h1 class="h3 mb-3 fw-normal">Daftar</h1>
                            <div class="form-floating">
                                <input type="number" name="nik" class="form-control mt-2" id="nik" placeholder="NIK" autofocus>
                                <label for="nik">NIK</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" name="nama" class="form-control mt-2" id="nama" placeholder="Nama" autofocus>
                                <label for="nama">Nama</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" name="username" class="form-control mt-2" id="username" placeholder="username" autofocus>
                                <label for="username">Username</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control mt-2" id="password" placeholder="password">
                                <label for="password">Password</label>
                            </div>
                            <div class="form-floating">
                                <input type="number" name="telp" class="form-control mt-2" id="telp" placeholder="telp" autofocus>
                                <label for="telp">Nomor Telepon</label>
                            </div>
                            <button class="w-100 btn btn-lg btn-primary mt-4" type="submit" >Daftar</button>
                        </form>
                    </main>
                </div>
            </div>
            
            {{-- @extends('layouts.auth')
@section('content')
    <div class="register-form">
      <div class="auth-vector">
        <img src="{{ asset('assets/vectors/register-vector.svg') }}" alt="" width="200px">
      </div>
      @if ($errors->any())
        <div class="alert alert-danger mt-4">
          <strong>Whoops!</strong> There were some problems with your input.<br><br>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
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
    </div>
@endsection --}}
