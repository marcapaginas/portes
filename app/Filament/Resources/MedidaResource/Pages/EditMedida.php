<?php

namespace App\Filament\Resources\MedidaResource\Pages;

use App\Filament\Resources\MedidaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMedida extends EditRecord
{
    protected static string $resource = MedidaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
