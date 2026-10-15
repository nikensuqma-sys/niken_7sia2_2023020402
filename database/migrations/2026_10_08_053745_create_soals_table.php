<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('soals', function (Blueprint $table) {
            $table->id();

            $table->foreignId('mata_pelajaran_id')
                ->constrained('mata_pelajarans')
                ->cascadeOnDelete();

            $table->text('pertanyaan');

            $table->text('pilihan_a');
            $table->text('pilihan_b');
            $table->text('pilihan_c');
            $table->text('pilihan_d');

            $table->enum('jawaban_benar', ['A', 'B', 'C', 'D']);

            $table->integer('bobot')->default(1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('soals');
    }
};