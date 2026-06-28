<?php

namespace App\Filament\Resources\KategoriKegiatanPosyandus\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\CreateAction;

use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Support\Enums\TextSize;

class KategoriKegiatanPosyandusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Split::make([
                    TextColumn::make('name')
                        // ->badge()
                        ->size(TextSize::Large)
                        ->searchable(),
                ])
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()
                    ->label('Tambahkan Kategori')
                    ->color("info"),
            ])
            ->recordActions([
                    ViewAction::make()
                        ->label("Buka"),
                    EditAction::make()
                        ->label("Edit"),
                    DeleteAction::make()
                        ->label("Hapus"),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
