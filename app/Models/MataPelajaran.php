<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MataPelajaran extends Model
{
    protected $fillable = [
        'kode',
        'nama',
        'deskripsi',
    ];

    public function soals(): HasMany
    {
        return $this->hasMany(Soal::class);
    }
}