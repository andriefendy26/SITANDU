<?php

namespace App\Filament\Resources\KategoriKegiatanPosyandus\Pages;

use App\Filament\Resources\KategoriKegiatanPosyandus\KategoriKegiatanPosyanduResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKategoriKegiatanPosyandus extends ListRecords
{
    protected static string $resource = KategoriKegiatanPosyanduResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
