<?php

namespace App\Filament\Resources\KategoriKegiatanPosyandus\Pages;

use App\Filament\Resources\KategoriKegiatanPosyandus\KategoriKegiatanPosyanduResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKategoriKegiatanPosyandu extends EditRecord
{
    protected static string $resource = KategoriKegiatanPosyanduResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
