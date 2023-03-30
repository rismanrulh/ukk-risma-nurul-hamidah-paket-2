@extends('layouts.master')
@section('css')
    a {
        text-decoration: none;
        color: #000;
    }   
@endsection
@section('content')
    <div class="card mb-4">
        <div class="card-body py-4 px-4 d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <div class="avatar avatar-xl">
                    <img src="{{ asset('assets/icons/avatar.svg') }}" width="50px" alt="Face 1">
                </div>
                <div class="ms-3 name">
                    <h5 class="font-bold">{{ Auth::guard('petugas')->user()->nama }}</h5>
                    <h6 class="text-muted">{{ Auth::guard('petugas')->user()->username }}</h6>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <div class="ms-3 name">
                    <h5 class="font-bold">Level Anda sebagai : {{ Auth::guard('petugas')->user()->level }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon red mb-2">
                                <img src="{{ asset('assets/bootstrap-icons/person.svg') }}" alt="">
                            </div>
                        </div>
                        <a href="{{ route('petugas.masyarakat') }}">
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Total Masyarakat</h6>
                                <h6 class="font-extrabold mb-0">{{ $masyarakats }}</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon purple mb-2">
                                    <img src="{{ asset('assets/bootstrap-icons/megaphone.svg') }}" alt="">
                                </div>
                            </div>
                            <a href="/petugas/daftar-pengaduan">
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Aduan</h6>
                                    <h6 class="font-extrabold mb-0">{{ $complains }}</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon green mb-2">
                                    <img src="{{ asset('assets/bootstrap-icons/arrow-clockwise.svg') }}" alt="">
                                </div>
                            </div>
                            <a href="/petugas/pengaduan-proses">
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Aduan Proses</h6>
                                    <h6 class="font-extrabold mb-0">{{ $complainsProcess }}</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <img src="{{ asset('assets/bootstrap-icons/check-square.svg') }}" alt="">
                                </div>
                            </div>
                            <a href="/petugas/pengaduan-selesai">
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Aduan Selesai</h6>
                                    <h6 class="font-extrabold mb-0">{{ $complainsFinish }}</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection