<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
  <link rel="shortcut icon" href="{{ asset('assets/icons/favicon.jpg') }}" type="image/x-icon">
  <title>Applikasi Pelaporan Pengaduan Masyarakat</title>
</head>
<body>

  <nav class="navbar bg-warning navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
      @if (Auth::guard('masyarakat')->user())
        <a class="navbar-brand" href="{{ route('masyarakat.dashboard') }}">
          <img src="{{ asset('assets/icons/icon-kabupaten.png') }}" alt="" width="30px">
          <span>Pengaduan Masyarakat</span>
        </a>
      @else
        <a class="navbar-brand" href="{{ route('petugas.dashboard') }}">
          <img src="{{ asset('assets/icons/icon-kabupaten.png') }}" alt="" width="30px">
          <span>Pengaduan Masyarakat</span>
        </a>
      @endif
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav">
          @if (Auth::guard('masyarakat')->user())   
            <li><a class="{{ request()->is('/masyarakat/complain') ? 'active' : '' }} nav-link" href="/masyarakat/complain">Daftar Aduan</a></li>
          @endif
          @if (Auth::guard('petugas')->user())
            <li><a class="{{ request()->is('petugas/daftar-pengaduan') ? 'active' : '' }} nav-link" href="/petugas/daftar-pengaduan">Daftar Aduan</a></li>
            <li><a class="{{ request()->is('petugas/daftar-tanggapan') ? 'active' : '' }} nav-link" href="{{ route('tanggapan') }}">Daftar Tanggapan</a></li>
            <li><a class="{{ request()->is('petugas/masyarakat') ? 'active' : '' }} nav-link" href="{{ route('petugas.masyarakat')}}">Daftar Masyarakat</a></li>
            <li><a class="{{ request()->is('petugas/petugas') ? 'active' : '' }} nav-link" href="{{ route('petugas.petugas')}}">Daftar Petugas</a></li>
          @endif
        </ul>
        <ul class="navbar-nav ms-auto">
          <li>
            <div class="dropstart text-white d-flex align-items-center">
              <span data-bs-toggle="dropdown" aria-expanded="false" class="me-2" style="cursor: pointer;">
                @if (Auth::guard('petugas')->user())
                {{ Auth::guard('petugas')->user()->nama }}
                @else
                {{ Auth::guard('masyarakat')->user()->nama }}
                @endif
                <img src="{{ asset('assets/icons/avatar.svg') }}" alt="" width="25px">
              </span>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    @yield('content')
  </div>

  <script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>
</html>
