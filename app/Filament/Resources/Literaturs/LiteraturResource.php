<?php

namespace App\Filament\Resources\Literaturs;

use App\Filament\Resources\Literaturs\Pages\CreateLiteratur;
use App\Filament\Resources\Literaturs\Pages\EditLiteratur;
use App\Filament\Resources\Literaturs\Pages\ListLiteraturs;
use App\Filament\Resources\Literaturs\Schemas\LiteraturForm;
use App\Filament\Resources\Literaturs\Tables\LiteratursTable;
use App\Models\Literatur;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LiteraturResource extends Resource
{
    protected static ?string $model = Literatur::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return LiteraturForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LiteratursTable::configure($table);
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
            'index' => ListLiteraturs::route('/'),
            'create' => CreateLiteratur::route('/create'),
            'edit' => EditLiteratur::route('/{record}/edit'),
        ];
    }
}
