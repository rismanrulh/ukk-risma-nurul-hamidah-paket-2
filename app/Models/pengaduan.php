<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengaduan extends Model
{
    use HasFactory;

    protected $fillable = ['tgl_pengaduan', 'nik', 'isi_laporan', 'foto', 'status'];

    public function getDataMasyarakat()
    {
        return $this->belongsTo(masyarakat::class, 'nik', 'nik');
    }

    public function getDataTanggapan()
    {
        return $this->belongsTo(tanggapan::class, 'id', 'id_pengaduan');
    }
}
