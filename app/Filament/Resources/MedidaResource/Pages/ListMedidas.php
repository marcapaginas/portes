<?php

namespace App\Filament\Resources\MedidaResource\Pages;

use App\Filament\Resources\MedidaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMedidas extends ListRecords
{
    protected static string $resource = MedidaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
