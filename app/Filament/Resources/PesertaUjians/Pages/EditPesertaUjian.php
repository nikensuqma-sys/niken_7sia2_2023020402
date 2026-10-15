<?php

namespace App\Filament\Resources\PesertaUjians\Pages;

use App\Filament\Resources\PesertaUjians\PesertaUjianResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPesertaUjian extends EditRecord
{
    protected static string $resource = PesertaUjianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
