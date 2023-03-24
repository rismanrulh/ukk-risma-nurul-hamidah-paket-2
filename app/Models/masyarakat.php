<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;
// use Illuminate\Database\Eloquent\Model;

class masyarakat extends Model
{
    use HasFactory;
    protected $guard = 'masyarakat';
    protected $fillable = [
        'nik',
        'nama',
        'username',
        'password',
        'telp',
    ];
}
