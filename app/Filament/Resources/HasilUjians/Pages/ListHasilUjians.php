<?php

namespace App\Filament\Resources\HasilUjians\Pages;

use App\Filament\Resources\HasilUjians\HasilUjianResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHasilUjians extends ListRecords
{
    protected static string $resource = HasilUjianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
