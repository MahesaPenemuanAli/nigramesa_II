<?php

namespace App\Filament\Resources\Tanamen\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;

class TanamanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_tanaman')
                    ->required()
                    ->maxLength(255),
                Select::make('kategori')
                    ->options([
                        'Hias' => 'Hias',
                        'Buah' => 'Buah',
                        'Sayur' => 'Sayur',
                        'Herbal' => 'Herbal',
                    ])
                    ->required(),
                Select::make('kebutuhan_air')
                    ->options([
                        'Rendah' => 'Rendah',
                        'Sedang' => 'Sedang',
                        'Tinggi' => 'Tinggi',
                    ])
                    ->required(),
                Select::make('kebutuhan_cahaya')
                    ->options([
                        'Rendah' => 'Rendah',
                        'Sedang' => 'Sedang',
                        'Tinggi' => 'Tinggi',
                    ])
                    ->required(),
                FileUpload::make('gambar')
                    ->image()
                    ->disk('public')
                    ->directory('tanaman-images')
                    ->visibility('public'),
                Textarea::make('deskripsi_singkat')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                RichEditor::make('cara_perawatan')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
