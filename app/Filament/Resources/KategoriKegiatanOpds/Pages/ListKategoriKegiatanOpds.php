<?php

namespace App\Filament\Resources\KategoriKegiatanOpds\Pages;

use App\Filament\Resources\KategoriKegiatanOpds\KategoriKegiatanOpdResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKategoriKegiatanOpds extends ListRecords
{
    protected static string $resource = KategoriKegiatanOpdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
