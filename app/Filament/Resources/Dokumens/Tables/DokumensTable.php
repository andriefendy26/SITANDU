<?php

namespace App\Filament\Resources\Dokumens\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

use Filament\Actions\CreateAction;

class DokumensTable
{
    public static function configure(Table $table): Table
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
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()
                    ->label("Arsipkan Dokumen")
                    ->color("info"),
            ])
            ->recordActions([
                DeleteAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
