<?php

namespace App\Filament\Resources\Pengerjaans;

use App\Filament\Resources\Pengerjaans\Pages\CreatePengerjaan;
use App\Filament\Resources\Pengerjaans\Pages\EditPengerjaan;
use App\Filament\Resources\Pengerjaans\Pages\ListPengerjaans;
use App\Filament\Resources\Pengerjaans\Schemas\PengerjaanForm;
use App\Filament\Resources\Pengerjaans\Tables\PengerjaansTable;
use App\Models\Pengerjaan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PengerjaanResource extends Resource
{
    protected static ?string $model = Pengerjaan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'jawaban';

    public static function form(Schema $schema): Schema
    {
        return PengerjaanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PengerjaansTable::configure($table);
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
            'index' => ListPengerjaans::route('/'),
            'create' => CreatePengerjaan::route('/create'),
            'edit' => EditPengerjaan::route('/{record}/edit'),
        ];
    }
}
