<?php

namespace App\Filament\Resources\KegiatanOpds\Pages;

use App\Filament\Resources\KegiatanOpds\KegiatanOpdResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKegiatanOpds extends ListRecords
{
    protected static string $resource = KegiatanOpdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
