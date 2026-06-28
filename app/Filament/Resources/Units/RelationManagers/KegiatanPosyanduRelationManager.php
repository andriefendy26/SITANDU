<?php

namespace App\Filament\Resources\Units\RelationManagers;

use App\Filament\Resources\Units\UnitResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class KegiatanPosyanduRelationManager extends RelationManager
{
    protected static string $relationship = 'kegiatanPosyandu';

    protected static ?string $relatedResource = UnitResource::class;

    public function table(Table $table): Table
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
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
