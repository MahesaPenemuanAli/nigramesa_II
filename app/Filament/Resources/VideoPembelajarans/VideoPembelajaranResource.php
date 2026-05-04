<?php

namespace App\Filament\Resources\VideoPembelajarans;

use App\Filament\Resources\VideoPembelajarans\Pages\CreateVideoPembelajaran;
use App\Filament\Resources\VideoPembelajarans\Pages\EditVideoPembelajaran;
use App\Filament\Resources\VideoPembelajarans\Pages\ListVideoPembelajarans;
use App\Filament\Resources\VideoPembelajarans\Schemas\VideoPembelajaranForm;
use App\Filament\Resources\VideoPembelajarans\Tables\VideoPembelajaransTable;
use App\Models\VideoPembelajaran;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VideoPembelajaranResource extends Resource
{
    protected static ?string $model = VideoPembelajaran::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = "Video Pembelajaran";

    protected static ?string $modelLabel = "Video Pembelajaran";

    protected static ?string $pluralModelLabel = "Video Pembelajaran";

    protected static UnitEnum|string|null $navigationGroup = "Konten Edukasi";

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return VideoPembelajaranForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VideoPembelajaransTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
                //
            ];
    }

    public static function getPages(): array
    {
        return [
            "index" => ListVideoPembelajarans::route("/"),
            "create" => CreateVideoPembelajaran::route("/create"),
            "edit" => EditVideoPembelajaran::route("/{record}/edit"),
        ];
    }
}
