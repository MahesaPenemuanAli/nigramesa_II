<?php

namespace App\Filament\Resources\Tanamen\Pages;

use App\Filament\Resources\Tanamen\TanamanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTanaman extends EditRecord
{
    protected static string $resource = TanamanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
