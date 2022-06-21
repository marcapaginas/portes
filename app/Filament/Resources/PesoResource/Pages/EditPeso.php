<?php

namespace App\Filament\Resources\PesoResource\Pages;

use App\Filament\Resources\PesoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeso extends EditRecord
{
    protected static string $resource = PesoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
