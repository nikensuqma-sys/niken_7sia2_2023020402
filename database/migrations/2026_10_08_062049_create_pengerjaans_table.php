<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengerjaans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('peserta_ujian_id')
                ->constrained('peserta_ujians')
                ->cascadeOnDelete();

            $table->foreignId('soal_id')
                ->constrained('soals')
                ->cascadeOnDelete();

            $table->string('jawaban')->nullable();

            $table->boolean('benar')->default(false);

            $table->integer('nilai')->default(0);

            $table->timestamps();

            $table->unique(['peserta_ujian_id', 'soal_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengerjaans');
    }
};