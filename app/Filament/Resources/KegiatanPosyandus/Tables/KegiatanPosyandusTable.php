<?php

namespace App\Filament\Resources\KegiatanPosyandus\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\CreateAction;

class KegiatanPosyandusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Pengguna')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('kategori.name')
                    ->label('Kategori')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('title')
                    ->searchable(),
                // TextColumn::make('image')
                //     ->label('Thumbnail')
                //     ->searchable(),
                ImageColumn::make('image')
                    ->label('Thumbnail')
                    ->disk('public')
                    // ->directory('kegiatan')
                    // ->rounded()
                    ->height(50)
                    ->width(50)
                    ->visibility("public"),
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
                    ->label("Tambahkan Kegiatan")
                    ->color("info"),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
