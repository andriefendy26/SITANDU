<?php

namespace App\Filament\Resources\Dokumens\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Tables\Filters\TrashedFilter;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;


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
                TrashedFilter::make(),
            ])
            ->headerActions([
                CreateAction::make()
                    ->label("Arsipkan Dokumen")
                    ->color("info"),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
                ForceDeleteAction::make(),
                RestoreAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
