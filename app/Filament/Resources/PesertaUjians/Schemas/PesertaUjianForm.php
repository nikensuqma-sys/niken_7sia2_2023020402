<?php

namespace App\Filament\Resources\PesertaUjians\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PesertaUjianForm
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

                Select::make('siswa_id')
                    ->label('Siswa')
                    ->relationship('siswa', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),

                DateTimePicker::make('mulai')
                    ->label('Waktu Mulai')
                    ->seconds(false),

                DateTimePicker::make('selesai')
                    ->label('Waktu Selesai')
                    ->seconds(false),

                TextInput::make('nilai')
                    ->label('Nilai')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'Belum Mulai' => 'Belum Mulai',
                        'Sedang Mengerjakan' => 'Sedang Mengerjakan',
                        'Selesai' => 'Selesai',
                    ])
                    ->default('Belum Mulai')
                    ->required(),
            ]);
    }
}