<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peserta_ujians', function (Blueprint $table) {
            $table->id();

            $table->foreignId('ujian_id')
                ->constrained('ujians')
                ->cascadeOnDelete();

            $table->foreignId('siswa_id')
                ->constrained('siswas')
                ->cascadeOnDelete();

            $table->timestamp('mulai')->nullable();

            $table->timestamp('selesai')->nullable();

            $table->integer('nilai')->nullable();

            $table->string('status')->default('Belum Mulai');

            $table->timestamps();

            $table->unique(['ujian_id', 'siswa_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peserta_ujians');
    }
};