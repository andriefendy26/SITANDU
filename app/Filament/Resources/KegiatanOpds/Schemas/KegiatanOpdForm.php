<?php

namespace App\Filament\Resources\KegiatanOpds\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;

class KegiatanOpdForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('id_kategori_kegiatan_opd')
                    ->relationship('kategori', 'name')
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('Nama Kategori Kegiatan OPD')
                            ->required(),
                    ])
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('title')
                    ->label('Judul Kegiatan OPD')
                    ->required(),
                RichEditor::make('content')
                    ->label('Kegiatan OPD')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
