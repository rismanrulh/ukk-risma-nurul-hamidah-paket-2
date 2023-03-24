<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tanggapan extends Model
{
    use HasFactory;
    
    protected $fillable = ['id_pengaduan', 'tgl_tanggapan', 'tanggapan', 'id_petugas'];

    public function getDataPengaduan()
    {
        return $this->belongsTo(Pengaduan::class, 'id_pengaduan', 'id')->with('getDataMasyarakat');
    }

    public function getDataMasyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'nik', 'nik');
    }

    public function getDataPetugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas', 'id');
    }
}
