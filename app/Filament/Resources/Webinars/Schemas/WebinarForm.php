<?php

namespace App\Filament\Resources\Webinars\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;

class WebinarForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('pembicara')
                    ->required()
                    ->maxLength(255),
                Select::make('status')
                    ->options([
                        'upcoming' => 'Upcoming',
                        'live' => 'Live',
                        'finished' => 'Finished',
                    ])
                    ->default('upcoming')
                    ->required(),
                DateTimePicker::make('waktu_mulai')
                    ->required(),
                DateTimePicker::make('waktu_selesai')
                    ->required(),
                TextInput::make('link_streaming')
                    ->label('Link Streaming (Opsional)')
                    ->url()
                    ->maxLength(255)
                    ->columnSpanFull(),
                FileUpload::make('cover_gambar')
                    ->image()
                    ->disk('public')
                    ->directory('webinar-covers')
                    ->visibility('public')
                    ->columnSpanFull(),
            ]);
    }
}
