<?php

namespace App\Filament\Resources\UjianSoals\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UjianSoalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('ujian_id')
                    ->label('Ujian')
                    ->relationship('ujian', 'nama_ujian')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('soal_id')
                    ->label('Soal')
                    ->relationship('soal', 'pertanyaan')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('urutan')
                    ->label('Urutan Soal')
                    ->numeric()
                    ->default(1)
                    ->minValue(1)
                    ->required(),
            ]);
    }
}