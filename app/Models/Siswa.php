<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Siswa extends Authenticatable
{
    protected $table = 'siswas';

    protected $fillable = [
        'nis',
        'nama',
        'kelas',
        'jurusan',
        'email',
        'no_hp',
    ];
}