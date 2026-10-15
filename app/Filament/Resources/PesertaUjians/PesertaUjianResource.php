<?php

namespace App\Filament\Resources\PesertaUjians;

use App\Filament\Resources\PesertaUjians\Pages\CreatePesertaUjian;
use App\Filament\Resources\PesertaUjians\Pages\EditPesertaUjian;
use App\Filament\Resources\PesertaUjians\Pages\ListPesertaUjians;
use App\Filament\Resources\PesertaUjians\Schemas\PesertaUjianForm;
use App\Filament\Resources\PesertaUjians\Tables\PesertaUjiansTable;
use App\Models\PesertaUjian;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PesertaUjianResource extends Resource
{
    protected static ?string $model = PesertaUjian::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'status';

    public static function form(Schema $schema): Schema
    {
        return PesertaUjianForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PesertaUjiansTable::configure($table);
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
            'index' => ListPesertaUjians::route('/'),
            'create' => CreatePesertaUjian::route('/create'),
            'edit' => EditPesertaUjian::route('/{record}/edit'),
        ];
    }
}
