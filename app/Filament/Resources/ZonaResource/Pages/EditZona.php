<?php

namespace App\Filament\Resources\ZonaResource\Pages;

use App\Filament\Resources\ZonaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditZona extends EditRecord
{
    protected static string $resource = ZonaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
