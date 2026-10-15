<?php

namespace App\Filament\Resources\UjianSoals;

use App\Filament\Resources\UjianSoals\Pages\CreateUjianSoal;
use App\Filament\Resources\UjianSoals\Pages\EditUjianSoal;
use App\Filament\Resources\UjianSoals\Pages\ListUjianSoals;
use App\Filament\Resources\UjianSoals\Schemas\UjianSoalForm;
use App\Filament\Resources\UjianSoals\Tables\UjianSoalsTable;
use App\Models\UjianSoal;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UjianSoalResource extends Resource
{
    protected static ?string $model = UjianSoal::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'urutan';

    public static function form(Schema $schema): Schema
    {
        return UjianSoalForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UjianSoalsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUjianSoals::route('/'),
            'create' => CreateUjianSoal::route('/create'),
            'edit' => EditUjianSoal::route('/{record}/edit'),
        ];
    }
}
