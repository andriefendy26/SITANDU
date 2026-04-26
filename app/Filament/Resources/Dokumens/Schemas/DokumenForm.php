<?php

namespace App\Filament\Resources\Dokumens\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fileupload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DokumenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Dokumen')->schema([
                    TextInput::make('title')
                        ->required(),
                    Select::make('id_jenis_dokumen')->relationship('jenisDokumen', 'title')
                        ->required(),
                    Textarea::make('note')
                        ->columnSpanFull(),
                ])->columns(2),
                Section::make('File Dokumen')->schema([
                    FileUpload::make('path')
                        ->disk('documents')
                        ->label('File Dokumen')
                        ->required(),
                ])->columns(1),
            ])->columns(1);
    }
}
