<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PesertaUjian extends Model
{
    protected $fillable = [
        'ujian_id',
        'siswa_id',
        'mulai',
        'selesai',
        'nilai',
        'status',
    ];

    protected $casts = [
        'mulai' => 'datetime',
        'selesai' => 'datetime',
        'nilai' => 'integer',
    ];

    protected $appends = [
        'nama_peserta',
    ];

    public function ujian(): BelongsTo
    {
        return $this->belongsTo(Ujian::class);
    }

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }

    public function getNamaPesertaAttribute(): string
    {
        return ($this->siswa?->nama ?? 'Tanpa Nama')
            . ' - '
            . ($this->ujian?->nama_ujian ?? 'Tanpa Ujian');
    }
}