<?php

namespace App\Filament\Resources\KategoriKegiatanOpds\RelationManagers;

use App\Filament\Resources\KategoriKegiatanOpds\KategoriKegiatanOpdResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class KegiatanOpdRelationManager extends RelationManager
{
    protected static string $relationship = 'KegiatanOpd';

    protected static ?string $relatedResource = KategoriKegiatanOpdResource::class;
    
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
            ->headerActions([
                CreateAction::make()
                    ->label('Tambahkan Kategori')
                    ->color("info"),
            ]);
    }
}
