<?php

namespace App\Filament\Resources\Units\RelationManagers;

use App\Filament\Resources\Units\UnitResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class DokumenRelationManager extends RelationManager
{
    protected static string $relationship = 'Dokumen';

    // protected static ?string $relatedResource = UnitResource::class;
    protected static ?string $title = 'Dokumen';

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
                CreateAction::make(),
            ]);
    }
}
