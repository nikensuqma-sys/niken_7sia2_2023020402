<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengerjaan extends Model
{
    protected $fillable = [
        'peserta_ujian_id',
        'soal_id',
        'jawaban',
        'benar',
        'nilai',
    ];

    protected $casts = [
        'benar' => 'boolean',
        'nilai' => 'integer',
    ];

    public function pesertaUjian(): BelongsTo
    {
        return $this->belongsTo(PesertaUjian::class);
    }

    public function soal(): BelongsTo
    {
        return $this->belongsTo(Soal::class);
    }
}