<?php

namespace App\Filament\Resources\Tanamen\Pages;

use App\Filament\Resources\Tanamen\TanamanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTanamen extends ListRecords
{
    protected static string $resource = TanamanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
