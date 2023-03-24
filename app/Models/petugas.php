<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;

class petugas extends Model
{
    use HasFactory;

    protected $guard = 'petugas';
    protected $fillable = ['tgl_pengaduan', 'tgl_selesai', 'nik', 'isi_laporan', 'foto', 'status'];

    public function getDataMasyarakat()
    {
        return $this->belongsTo(masyarakat::class, 'nik', 'nik');
    }

    public function getDataTanggapan()
    {
        return $this->belongsTo(tanggapan::class, 'id', 'id_pengaduan');
    }
}
