<?php

namespace App\Filament\Resources\InformasiLayanans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class InformasiLayananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Layanan')->schema([
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
                        ->directory('informasi')
                        ->image()
                        ->required()
                        ->columnSpanfull(),
                ])->columns(2),
                Section::make('Deskripsi')->schema([
                    RichEditor::make('content')
                        ->label('Deskripsi Informasi Layanan')
                        ->required()
                        ->columnSpanFull(),
                ])->columns(1),
                Section::make('Dokumen Pendukung')
                    ->description('Upload beberapa dokumen pendukung (PDF, PPT, XLS)')
                    ->schema([
                        Repeater::make('documents')
                            ->relationship('documents')
                            ->schema([
                                FileUpload::make('file_path')
                                    ->label('Dokumen')
                                    ->disk('public')
                                    ->directory('informasi/documents')
                                    ->acceptedFileTypes(['application/pdf', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'])
                                    ->helperText('Format: PDF, PPT, PPTX, XLS, XLSX')
                                    ->columnSpanFull(),
                            ])
                            ->addActionLabel('+ Tambah Dokumen')
                            ->minItems(0)
                            ->maxItems(10)
                            ->reorderable()
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['file_path'] ?? 'Dokumen'),
                    ])->columnSpanFull(),
            ])->columns(1);
    }
}
