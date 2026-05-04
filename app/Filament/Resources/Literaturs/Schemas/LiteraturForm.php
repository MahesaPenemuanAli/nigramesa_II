<?php

namespace App\Filament\Resources\Literaturs\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;

class LiteraturForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required()
                    ->maxLength(255),
                TextInput::make('penulis')
                    ->required()
                    ->maxLength(255),
                Select::make('tipe')
                    ->options([
                        'Jurnal' => 'Jurnal',
                        'Artikel' => 'Artikel',
                        'E-Book' => 'E-Book',
                    ])
                    ->required(),
                DatePicker::make('tanggal_terbit')
                    ->required(),
                FileUpload::make('cover_gambar')
                    ->image()
                    ->disk('public')
                    ->directory('literatur-covers')
                    ->visibility('public'),
                FileUpload::make('file_url')
                    ->label('File E-Book / PDF (Opsional)')
                    ->acceptedFileTypes(['application/pdf'])
                    ->disk('public')
                    ->directory('literatur-files')
                    ->visibility('public'),
            ]);
    }
}
