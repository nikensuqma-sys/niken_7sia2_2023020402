<?php

namespace App\Filament\Resources\Ujians\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UjianForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_ujian')
                    ->label('Nama Ujian')
                    ->required()
                    ->maxLength(255),

                Select::make('mata_pelajaran_id')
                    ->label('Mata Pelajaran')
                    ->relationship('mataPelajaran', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),

                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->rows(3)
                    ->columnSpanFull(),

                DatePicker::make('tanggal_mulai')
                    ->label('Tanggal Mulai')
                    ->native(false)
                    ->displayFormat('d/m/Y')
                    ->required(),

                DatePicker::make('tanggal_selesai')
                    ->label('Tanggal Selesai')
                    ->native(false)
                    ->displayFormat('d/m/Y')
                    ->required(),

                TimePicker::make('jam_mulai')
                    ->label('Jam Mulai')
                    ->native(false)
                    ->seconds(false)
                    ->format('H:i')
                    ->required(),

                TimePicker::make('jam_selesai')
                    ->label('Jam Selesai')
                    ->native(false)
                    ->seconds(false)
                    ->format('H:i')
                    ->required(),

                TextInput::make('durasi')
                    ->label('Durasi (Menit)')
                    ->numeric()
                    ->default(60)
                    ->minValue(1)
                    ->required(),

                Toggle::make('status')
                    ->label('Ujian Aktif')
                    ->default(true),
            ]);
    }
}