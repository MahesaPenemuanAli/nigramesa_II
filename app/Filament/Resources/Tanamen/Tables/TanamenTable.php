<?php

namespace App\Filament\Resources\Tanamen\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class TanamenTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gambar')
                    ->circular(),
                TextColumn::make('nama_tanaman')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('kategori')
                    ->badge()
                    ->searchable(),
                TextColumn::make('kebutuhan_air')
                    ->badge()
                    ->color('info')
                    ->searchable(),
                TextColumn::make('kebutuhan_cahaya')
                    ->badge()
                    ->color('warning')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
