<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ujians', function (Blueprint $table) {
            $table->id();

            $table->string('nama_ujian');

            $table->foreignId('mata_pelajaran_id')
                ->constrained('mata_pelajarans')
                ->cascadeOnDelete();

            $table->text('deskripsi')->nullable();

            $table->date('tanggal_mulai');

            $table->date('tanggal_selesai');

            $table->time('jam_mulai');

            $table->time('jam_selesai');

            $table->integer('durasi')->default(60);

            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ujians');
    }
};