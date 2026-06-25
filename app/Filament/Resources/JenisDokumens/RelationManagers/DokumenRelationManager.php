<?php

namespace App\Filament\Resources\JenisDokumens\RelationManagers;

use App\Filament\Resources\JenisDokumens\JenisDokumenResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fileupload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DokumenRelationManager extends RelationManager
{
    protected static string $relationship = 'dokumen';

    protected static ?string $relatedResource = JenisDokumenResource::class;

    public function form(Schema $schema): Schema
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

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
