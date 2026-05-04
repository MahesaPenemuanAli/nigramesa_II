<?php

namespace App\Filament\Resources\VideoPembelajarans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VideoPembelajaransTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                ImageColumn::make('cover_gambar')
                    ->label('Cover')
                    ->disk('public')
                    ->square(),

                TextColumn::make('judul')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                TextColumn::make('kategori')
                    ->badge()
                    ->color('success')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('pemateri')
                    ->searchable()
                    ->wrap(),

                TextColumn::make('durasi')
                    ->sortable(),

                TextColumn::make('is_premium')
                    ->label('Akses')
                    ->badge()
                    ->formatStateUsing(fn (bool $state): string => $state ? 'Premium' : 'Gratis')
                    ->color(fn (bool $state): string => $state ? 'warning' : 'success')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
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
