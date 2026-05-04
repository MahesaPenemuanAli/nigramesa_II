<?php

namespace App\Filament\Resources\Tanamen;

use App\Filament\Resources\Tanamen\Pages\CreateTanaman;
use App\Filament\Resources\Tanamen\Pages\EditTanaman;
use App\Filament\Resources\Tanamen\Pages\ListTanamen;
use App\Filament\Resources\Tanamen\Schemas\TanamanForm;
use App\Filament\Resources\Tanamen\Tables\TanamenTable;
use App\Models\Tanaman;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TanamanResource extends Resource
{
    protected static ?string $model = Tanaman::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return TanamanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TanamenTable::configure($table);
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
            'index' => ListTanamen::route('/'),
            'create' => CreateTanaman::route('/create'),
            'edit' => EditTanaman::route('/{record}/edit'),
        ];
    }
}
