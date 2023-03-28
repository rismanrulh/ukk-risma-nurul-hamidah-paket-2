@extends('layouts.master')
@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Pengaduan</h4>
        </div>
        
    
        <div class="card-body">
            <div class="row">
                <form action="/masyarakat" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="basicInput">Tanggal</label>
                        <input name="tgl_pengaduan" type="date" class="form-control" id="basicInput">
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Foto</label>
                        <input name="foto" type="file" class="form-control" id="basicInput">
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Isi Laporan</label>
                        <textarea name="isi_laporan" class="form-control" cols="30" rows="2"></textarea>
                        <input type="hidden" name="nik" value="{{ Auth::guard('masyarakat')->user()->nik }}">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                        <a href="{{ route('pengaduan.index') }}" class="btn btn-outline-danger">Kembali</a>
                        <button type="submit" class="btn btn-danger">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection