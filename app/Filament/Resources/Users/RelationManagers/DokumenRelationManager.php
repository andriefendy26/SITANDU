<?php

namespace App\Filament\Resources\Users\RelationManagers;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

use Filament\Tables\Columns\TextColumn;
// use Filament\Tables\Table;
use App\Filament\Widgets\DokumenUserStatsWidget;

class DokumenRelationManager extends RelationManager
{
    protected static string $relationship = 'dokumen';
    protected static ?string $title = 'Dokumen';


    // protected static ?string $relatedResource = UserResource::class;

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
             ->columns([
                TextColumn::make('User.name')
                    ->badge()
                    ->color('info')
                    ->sortable(),
                TextColumn::make('JenisDokumen.title')
                    ->badge()
                    ->color('info')
                    ->sortable(),
                TextColumn::make('title')
                    ->label('Judul Dokumen')
                    ->wrap()
                    ->badge()
                    ->searchable(),
                TextColumn::make('path')
                    ->label('File')
                    ->formatStateUsing(fn () => 'Download Document')
                    ->url(fn ($record) => asset('storage/documents/' . $record->path))
                    ->openUrlInNewTab()
                    ->color('success')
                    ->icon('heroicon-o-document')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->headerActions([
                // CreateAction::make(),
            ]);
    }

    protected function getHeaderWidgets(): array
    {
        return [
            DokumenUserStatsWidget::make([
                'userId' => $this->getOwnerRecord()->id,
            ]),
        ];
    }
    
}
