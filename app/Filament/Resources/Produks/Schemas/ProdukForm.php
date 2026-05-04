<?php

namespace App\Filament\Resources\Produks\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;

class ProdukForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_produk')
                    ->required()
                    ->maxLength(255),
                Select::make('kategori')
                    ->options([
                        'Bibit' => 'Bibit',
                        'Pupuk' => 'Pupuk',
                        'Alat' => 'Alat Pertanian',
                    ])
                    ->required(),
                TextInput::make('harga')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(99999999999)
                    ->prefix('Rp'),
                TextInput::make('stok')
                    ->required()
                    ->numeric()
                    ->integer()
                    ->minValue(0)
                    ->maxValue(2147483647),
                FileUpload::make('gambar')
                    ->image()
                    ->disk('public')
                    ->directory('produk-images')
                    ->visibility('public'),
                RichEditor::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
