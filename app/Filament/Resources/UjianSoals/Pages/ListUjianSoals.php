<?php

namespace App\Filament\Resources\UjianSoals\Pages;

use App\Filament\Resources\UjianSoals\UjianSoalResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUjianSoals extends ListRecords
{
    protected static string $resource = UjianSoalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
