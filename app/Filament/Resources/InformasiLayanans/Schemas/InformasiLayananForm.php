<?php

namespace App\Filament\Resources\InformasiLayanans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class InformasiLayananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('id_kategori_layanan')
                    ->relationship('kategori', 'name')
                    ->label('Kategori Layanan')
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('Nama Kategori Layanan')
                            ->required(),
                    ])
                    ->searchable()
                    ->preload()
                    ->required(),
                 
                TextInput::make('title')
                    ->label('Judul Informasi Layanan')
                    ->required(),
                FileUpload::make('image')
                    ->label('Thumbnail Artikel')
                    ->disk('public')
                    ->directory('kegiatan')
                    ->image()
                    ->required()
                    ->columnSpanfull(),
                RichEditor::make('content')
                    ->label('Deskripsi Informasi Layanan')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
