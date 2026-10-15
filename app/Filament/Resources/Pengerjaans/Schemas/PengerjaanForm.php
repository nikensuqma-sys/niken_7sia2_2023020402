<?php

namespace App\Filament\Resources\Pengerjaans\Schemas;

use App\Models\PesertaUjian;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PengerjaanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('peserta_ujian_id')
                    ->label('Peserta Ujian')
                    ->options(function () {
                        return PesertaUjian::with(['siswa', 'ujian'])
                            ->get()
                            ->mapWithKeys(function ($peserta) {
                                return [
                                    $peserta->id => ($peserta->siswa?->nama ?? 'Tanpa Nama')
                                        . ' - '
                                        . ($peserta->ujian?->nama_ujian ?? 'Tanpa Ujian'),
                                ];
                            })
                            ->toArray();
                    })
                    ->searchable()
                    ->required(),

                Select::make('soal_id')
                    ->label('Soal')
                    ->relationship('soal', 'pertanyaan')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('jawaban')
                    ->label('Jawaban Siswa')
                    ->options([
                        'A' => 'A',
                        'B' => 'B',
                        'C' => 'C',
                        'D' => 'D',
                    ])
                    ->placeholder('Pilih jawaban'),

                Toggle::make('benar')
                    ->label('Jawaban Benar')
                    ->default(false),

                TextInput::make('nilai')
                    ->label('Nilai')
                    ->numeric()
                    ->default(0)
                    ->minValue(0)
                    ->required(),
            ]);
    }
}