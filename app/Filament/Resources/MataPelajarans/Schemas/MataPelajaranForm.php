<?php

namespace App\Filament\Resources\MataPelajarans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MataPelajaranForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode')
                    ->required(),
                TextInput::make('nama')
                    ->required(),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
            ]);
    }
}
