<?php

namespace App\Filament\Resources\Soals\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SoalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('mata_pelajaran_id')
                    ->label('Mata Pelajaran')
                    ->relationship('mataPelajaran', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),

                Textarea::make('pertanyaan')
                    ->label('Pertanyaan')
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),

                Textarea::make('pilihan_a')
                    ->label('Pilihan A')
                    ->required()
                    ->rows(2),

                Textarea::make('pilihan_b')
                    ->label('Pilihan B')
                    ->required()
                    ->rows(2),

                Textarea::make('pilihan_c')
                    ->label('Pilihan C')
                    ->required()
                    ->rows(2),

                Textarea::make('pilihan_d')
                    ->label('Pilihan D')
                    ->required()
                    ->rows(2),

                Select::make('jawaban_benar')
                    ->label('Jawaban Benar')
                    ->options([
                        'A' => 'A',
                        'B' => 'B',
                        'C' => 'C',
                        'D' => 'D',
                    ])
                    ->required(),

                TextInput::make('bobot')
                    ->label('Bobot Nilai')
                    ->numeric()
                    ->default(1)
                    ->required(),
            ]);
    }
}