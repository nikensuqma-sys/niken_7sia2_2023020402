<?php

namespace App\Filament\Resources\PesertaUjians\Pages;

use App\Filament\Resources\PesertaUjians\PesertaUjianResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPesertaUjians extends ListRecords
{
    protected static string $resource = PesertaUjianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
