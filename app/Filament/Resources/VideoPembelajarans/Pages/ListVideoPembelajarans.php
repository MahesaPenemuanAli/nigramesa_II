<?php

namespace App\Filament\Resources\VideoPembelajarans\Pages;

use App\Filament\Resources\VideoPembelajarans\VideoPembelajaranResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVideoPembelajarans extends ListRecords
{
    protected static string $resource = VideoPembelajaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
