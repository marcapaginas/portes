<?php

namespace App\Filament\Resources\ProvinciaResource\Pages;

use App\Filament\Resources\ProvinciaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProvincia extends EditRecord
{
    protected static string $resource = ProvinciaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
