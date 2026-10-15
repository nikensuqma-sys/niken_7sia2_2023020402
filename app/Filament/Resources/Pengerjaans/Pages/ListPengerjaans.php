<?php

namespace App\Filament\Resources\Pengerjaans\Pages;

use App\Filament\Resources\Pengerjaans\PengerjaanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPengerjaans extends ListRecords
{
    protected static string $resource = PengerjaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
