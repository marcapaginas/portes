<?php

namespace App\Filament\Resources\ZonaResource\Pages;

use App\Filament\Resources\ZonaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListZonas extends ListRecords
{
    protected static string $resource = ZonaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
