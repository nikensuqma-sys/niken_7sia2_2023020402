<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UjianSoal extends Model
{
    protected $fillable = [
        'ujian_id',
        'soal_id',
        'urutan',
    ];

    public function ujian(): BelongsTo
    {
        return $this->belongsTo(Ujian::class);
    }

    public function soal(): BelongsTo
    {
        return $this->belongsTo(Soal::class);
    }
}