<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Artikel')->schema([
                    Select::make('id_category_articles')
                        ->relationship(name: 'category', titleAttribute: 'name')
                        ->createOptionForm([
                            TextInput::make('name')
                                ->required(),
                        ])
                        ->required(),
                    TextInput::make('title')
                        ->required(),
                    TextInput::make('slug')
                        ->required(),
                    FileUpload::make('image')
                        ->label('Thumbnail Artikel')
                        ->disk('public')
                        ->directory('articles')
                        ->image()
                        ->required(),
                ])->columns(2),
                Section::make('Konten Artikel')->schema([
                    RichEditor::make('content')
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
                                    ->directory('articles/documents')
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
