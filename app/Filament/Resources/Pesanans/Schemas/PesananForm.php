<?php

namespace App\Filament\Resources\Pesanans\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;

class PesananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('id')
                    ->label('ID Pesanan')
                    ->disabled(),
                TextInput::make('user_id')
                    ->label('ID User')
                    ->disabled(),
                TextInput::make('total_harga')
                    ->numeric()
                    ->prefix('Rp')
                    ->disabled(),
                TextInput::make('metode_pembayaran')
                    ->disabled(),
                Textarea::make('alamat_pengiriman')
                    ->disabled()
                    ->columnSpanFull(),
                Select::make('status_pesanan')
                    ->label('Status Pengiriman')
                    ->options([
                        'Menunggu Pembayaran' => 'Menunggu Pembayaran',
                        'Diproses' => 'Diproses',
                        'Dikirim' => 'Dikirim',
                        'Selesai' => 'Selesai',
                        'Dibatalkan' => 'Dibatalkan',
                    ])
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
