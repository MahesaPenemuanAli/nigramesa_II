<?php

namespace App\Filament\Resources\Literaturs\Pages;

use App\Filament\Resources\Literaturs\LiteraturResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLiteraturs extends ListRecords
{
    protected static string $resource = LiteraturResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
