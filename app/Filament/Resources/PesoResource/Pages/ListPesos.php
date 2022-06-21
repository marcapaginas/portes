<?php

namespace App\Filament\Resources\PesoResource\Pages;

use App\Filament\Resources\PesoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPesos extends ListRecords
{
    protected static string $resource = PesoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
