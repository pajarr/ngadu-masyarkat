<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'pengaduan';
    protected $fillable = ['id_pengaduan', 'nama_pengadu', 'tgl_pengaduan', 'nik', 'isi_laporan', 'foto', 'status'];
}

