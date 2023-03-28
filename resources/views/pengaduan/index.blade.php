@extends('layouts.master')
@section('content')
    <div class="mt-2">
        <div class="d-flex">
            <h4>Daftar Pengaduan</h4>
            <a href="/masyarakat/create" class="btn btn-light ms-auto">
                <img src="{{ asset('assets/icons/plus-lg.svg') }}" width="20px" alt="">
                Tambah Aduan
            </a>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table class="table table-primary mt-4 text-center">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal Pengaduan</th>
                    <th scope="col">Isi Laporan</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Status</th>
                    <th scope="col" style="width: 100px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($complains as $complain)
                    <tr>
                        <td scope="row">{{ $complains->firstItem() + $loop->index }}.</td>
                        <td>{{ $complain->tgl_pengaduan }}</td>
                        <td>{{ $complain->isi_laporan }}</td>
                        <td>
                            @if ($complain->foto != '-')
                                <img src="{{ asset($complain->foto) }}" alt="foto aduan" width="100px">
                            @else
                                {{ $complain->foto }}
                            @endif
                        </td>
                        <td>
                            {!! $complain->status == '0'
                                ? '<span class="badge text-bg-dark">Pending</span>'
                                : ($complain->status == 'proses'
                                    ? '<span class="badge text-bg-warning">Proses</span>'
                                    : '<span class="badge text-bg-success">Selesai</span>') !!}
                        </td>
                        <td>
                            <a class="text-decoration-none" href="/masyarakat/pengaduan/edit/{{ $complain->id }}">
                                <button type="button" class="btn btn-light btn-sm">
                                    <img src="{{ asset('assets/icons/pencil-square.svg') }}" width="20px" alt="">
                                </button>
                            </a>
                            <a class="text-decoration-none" href="/masyarakat/pengaduan/delete/{{ $complain->id }}"
                                onclick="return confirm('Are you sure to delete?')">
                                <button type="button" class="btn btn-danger btn-sm">
                                    <img src="{{ asset('assets/icons/trash.svg') }}" width="20px" alt="">
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $complains->links() }}
    </div>
@endsection
