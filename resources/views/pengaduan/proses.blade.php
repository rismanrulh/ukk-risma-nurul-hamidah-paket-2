@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('generate.PP') }}" class="btn btn-danger ms-auto">
                <img src="{{ asset('assets/bootstrap-icons/printer.svg') }}" width="20px" alt="">
                Generate Laporan
            </a>
            <h4 class="card-title">Data Pengaduan</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-light mb-2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="width: 200px">Tanggal</th>
                            <th>Nama Pengaduan</th>
                            <th>Isi Laporan</th>
                            {{-- <th>Foto</th> --}}
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengaduans as $k => $pengaduan)
                            <tr>
                                <td> {{ $k += 1 }}</td> 
                                <td>
                                    {{ $pengaduan->tgl_pengaduan }}
                                </td>
                                <td>{{ $pengaduan->getDataMasyarakat->nama }}</td>
                                <td>{{ $pengaduan->isi_laporan }}</td>
                                {{-- <td>
                                    @if ($pengaduan->foto != "-")
                                        <img src="{{ asset($pengaduan->foto) }}" alt="foto aduan" width="100px">
                                    @else
                                        {{ $pengaduan->foto }}
                                    @endif
                                </td> --}}
                                <td>
                                    <span class="badge text-bg-success">{{ $pengaduan->status }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $pengaduans->links() }} --}}
            </div>
        </div>
    </div>
@endsection