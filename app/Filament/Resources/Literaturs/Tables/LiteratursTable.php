<?php

namespace App\Filament\Resources\Literaturs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class LiteratursTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_gambar'),
                TextColumn::make('judul')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('penulis')
                    ->searchable(),
                TextColumn::make('tipe')
                    ->badge()
                    ->searchable(),
                TextColumn::make('tanggal_terbit')
                    ->date()
                    ->sortable(),
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
