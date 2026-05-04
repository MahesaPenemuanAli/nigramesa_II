<?php

namespace App\Filament\Resources\VideoPembelajarans\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class VideoPembelajaranForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->label('Judul Video')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->required()
                    ->rows(6)
                    ->columnSpanFull(),

                TextInput::make('pemateri')
                    ->label('Pemateri')
                    ->required()
                    ->maxLength(255),

                TextInput::make('kategori')
                    ->label('Kategori')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Contoh: Hidroponik, Tanaman Hias, Smart Farming'),

                TextInput::make('durasi')
                    ->label('Durasi')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Contoh: 15 Menit'),

                Toggle::make('is_premium')
                    ->label('Konten Premium')
                    ->default(false)
                    ->inline(false),

                TextInput::make('link_youtube')
                    ->label('Link YouTube')
                    ->required()
                    ->url()
                    ->maxLength(255)
                    ->placeholder('https://www.youtube.com/watch?v=...')
                    ->helperText('Bisa menggunakan link YouTube biasa, short link, atau embed link.')
                    ->columnSpanFull(),

                FileUpload::make('cover_gambar')
                    ->label('Cover Gambar')
                    ->image()
                    ->disk('public')
                    ->directory('video-pembelajaran-covers')
                    ->visibility('public')
                    ->helperText('Opsional. Jika dikosongkan, halaman publik akan memakai placeholder otomatis.')
                    ->columnSpanFull(),
            ]);
    }
}
