<?php

namespace App\Filament\Resources\HasilUjians\Pages;

use App\Filament\Resources\HasilUjians\HasilUjianResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHasilUjian extends EditRecord
{
    protected static string $resource = HasilUjianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
