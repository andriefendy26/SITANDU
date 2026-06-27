<?php

namespace App\Filament\Resources\KegiatanOpds\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;

use Filament\Schemas\Components\Section;
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
                FileUpload::make('image')
                    ->label('Thumbnail Artikel')
                    ->disk('public')
                    ->directory('kegiatan')
                    ->image()
                    ->required(),
                RichEditor::make('content')
                    ->label('Kegiatan OPD')
                    ->required()
                    ->columnSpanFull(),
              Section::make('Dokumentasi / Foto')
                ->description('Tambahkan foto dokumentasi kegiatan (maksimal 10 foto)')
                ->schema([
                    Repeater::make('dokumentasi')
                        ->relationship('dokumentasi') // nama relasi di model
                        ->schema([
                            FileUpload::make('file_path')
                                ->image()
                                ->disk('public')
                                ->directory('dokumentasi-kegiatan')
                                ->imagePreviewHeight('150')
                                ->required(),

                        ])
                        // ->columns(1)
                        ->addActionLabel('+ Tambah Foto')
                        ->minItems(1)
                        ->maxItems(10)
                        ->reorderable('urutan') // drag & drop urutan
                        // ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['keterangan'] ?? 'Foto'),
                ]),
            ]);
    }
}
