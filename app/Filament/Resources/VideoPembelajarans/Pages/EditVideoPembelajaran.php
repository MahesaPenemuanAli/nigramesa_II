<?php

namespace App\Filament\Resources\VideoPembelajarans\Pages;

use App\Filament\Resources\VideoPembelajarans\VideoPembelajaranResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditVideoPembelajaran extends EditRecord
{
    protected static string $resource = VideoPembelajaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
