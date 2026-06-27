<?php

namespace App\Filament\Resources\KegiatanOpds\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class KegiatanOpdsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('kategori.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('title')
                    ->searchable(),
                // TextColumn::make('dokumentasi.file_path')
                //     ->searchable(),
                ImageColumn::make('dokumentasi.file_path')
                    // ->disk('private')
                    ->imageHeight(40)
                    ->circular()
                    ->stacked()
                    ->ring(5),
                // ImageColumn::make('dokumentasi.path')
                //     ->disk('private')
                //     ->imageHeight(40)
                //     ->circular()
                //     ->stacked()
                //     ->ring(5),

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
