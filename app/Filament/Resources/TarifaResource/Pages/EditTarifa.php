<?php

namespace App\Filament\Resources\TarifaResource\Pages;

use App\Filament\Resources\TarifaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTarifa extends EditRecord
{
    protected static string $resource = TarifaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
