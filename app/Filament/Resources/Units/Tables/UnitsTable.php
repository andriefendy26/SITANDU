<?php

namespace App\Filament\Resources\Units\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;

use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Tables\Filters\TrashedFilter;

use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;

class UnitsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Split::make([
                    TextColumn::make('name')
                        ->searchable()
                        ->icon('heroicon-m-building-office')
                        ->iconPosition(\Filament\Support\Enums\IconPosition::Before)
                        ->weight(\Filament\Support\Enums\FontWeight::SemiBold),
                    // TextColumn::make('created_at')
                    //     ->dateTime('d M Y, H:i')
                    //     ->sortable()
                    //     ->icon('heroicon-m-calendar')
                    //     ->toggleable(isToggledHiddenByDefault: true),
                    // TextColumn::make('updated_at')
                    //     ->dateTime('d M Y, H:i')
                    //     ->sortable()
                    //     ->icon('heroicon-m-arrow-path')
                    //     ->toggleable(isToggledHiddenByDefault: true),
                ])
            ])
            ->filters([
                //
                TrashedFilter::make(),
            ])
            ->headerActions([
                CreateAction::make()
                    ->label('Tambahkan Units')
                    ->color("info"),
            ])
            ->recordActions([
                ViewAction::make(),
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