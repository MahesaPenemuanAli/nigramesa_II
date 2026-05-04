<?php

namespace App\Filament\Resources\Pesanans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class PesanansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID Pesanan')
                    ->searchable()
                    ->sortable(),
                // User::name assumed relationship available, but standard is `user_id` or `user.name`
                TextColumn::make('user_id')
                    ->label('ID User')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('total_harga')
                    ->money('idr')
                    ->sortable(),
                TextColumn::make('status_pesanan')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Menunggu Pembayaran' => 'warning',
                        'Diproses' => 'info',
                        'Dikirim' => 'primary',
                        'Selesai' => 'success',
                        'Dibatalkan' => 'danger',
                        default => 'gray',
                    })
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
