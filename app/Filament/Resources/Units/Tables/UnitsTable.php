<?php

namespace App\Filament\Resources\Units\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UnitsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->icon('heroicon-m-building-office')
                    ->iconPosition(\Filament\Support\Enums\IconPosition::Before)
                    ->weight(\Filament\Support\Enums\FontWeight::SemiBold),
                TextColumn::make('created_at')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->icon('heroicon-m-calendar')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->icon('heroicon-m-arrow-path')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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