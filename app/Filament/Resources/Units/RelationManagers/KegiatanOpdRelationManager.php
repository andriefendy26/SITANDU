<?php

namespace App\Filament\Resources\Units\RelationManagers;

use App\Filament\Resources\Units\UnitResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class KegiatanOpdRelationManager extends RelationManager
{
    protected static string $relationship = 'kegiatanOpd';

    protected static ?string $relatedResource = UnitResource::class;

    protected static ?string $title = 'Kegiatan OPD';

    public function table(Table $table): Table
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
                    ->disk('public')
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
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
