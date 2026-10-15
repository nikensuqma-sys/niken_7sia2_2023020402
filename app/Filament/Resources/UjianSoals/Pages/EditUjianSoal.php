<?php

namespace App\Filament\Resources\UjianSoals\Pages;

use App\Filament\Resources\UjianSoals\UjianSoalResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUjianSoal extends EditRecord
{
    protected static string $resource = UjianSoalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
