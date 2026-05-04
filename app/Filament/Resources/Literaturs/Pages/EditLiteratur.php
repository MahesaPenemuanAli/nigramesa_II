<?php

namespace App\Filament\Resources\Literaturs\Pages;

use App\Filament\Resources\Literaturs\LiteraturResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLiteratur extends EditRecord
{
    protected static string $resource = LiteraturResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
