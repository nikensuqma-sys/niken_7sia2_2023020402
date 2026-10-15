<?php

namespace App\Filament\Resources\HasilUjians;

use App\Filament\Resources\HasilUjians\Pages\ListHasilUjians;
use App\Filament\Resources\HasilUjians\Tables\HasilUjiansTable;
use App\Models\PesertaUjian;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HasilUjianResource extends Resource
{
    protected static ?string $model = PesertaUjian::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedClipboardDocumentCheck;

    protected static ?string $navigationLabel = 'Hasil Ujian';

    protected static ?string $modelLabel = 'Hasil Ujian';

    protected static ?string $pluralModelLabel = 'Hasil Ujian';

    protected static ?int $navigationSort = 6;

    public static function table(Table $table): Table
    {
        return HasilUjiansTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHasilUjians::route('/'),
        ];
    }
}