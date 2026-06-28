<?php

namespace App\Filament\Resources\Units\RelationManagers;

use App\Filament\Resources\Units\UnitResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class KegiatanOpdRelationManager extends RelationManager
{
    protected static string $relationship = 'kegiatanOpd';

    protected static ?string $relatedResource = UnitResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
