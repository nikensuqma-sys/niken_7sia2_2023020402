<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ujian_soals', function (Blueprint $table) {
            $table->id();

            $table->foreignId('ujian_id')
                ->constrained('ujians')
                ->cascadeOnDelete();

            $table->foreignId('soal_id')
                ->constrained('soals')
                ->cascadeOnDelete();

            $table->integer('urutan')->default(1);

            $table->timestamps();

            $table->unique(['ujian_id', 'soal_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ujian_soals');
    }
};