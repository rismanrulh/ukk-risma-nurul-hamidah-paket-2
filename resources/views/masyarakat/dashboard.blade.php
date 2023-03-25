@extends('layouts.master')

@section('content')
    <div class="d-flex align-items-center" style="height: 90vh">
        <div class="col-md-12 text-center">
        <h1>Halo, Selamat Datang <br> <strong>{{ Auth::guard('masyarakat')->user()->nama }}</strong></h1>
        <p>Aduan Anda : {{ $complains }}</p>
        </div>
    </div>
@endsection
