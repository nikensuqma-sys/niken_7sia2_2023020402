<?php

namespace App\Filament\Resources\Pengerjaans\Pages;

use App\Filament\Resources\Pengerjaans\PengerjaanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPengerjaan extends EditRecord
{
    protected static string $resource = PengerjaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
