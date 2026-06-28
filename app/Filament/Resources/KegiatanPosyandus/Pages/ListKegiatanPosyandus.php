<?php

namespace App\Filament\Resources\KegiatanPosyandus\Pages;

use App\Filament\Resources\KegiatanPosyandus\KegiatanPosyanduResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKegiatanPosyandus extends ListRecords
{
    protected static string $resource = KegiatanPosyanduResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // CreateAction::make(),
        ];
    }
}
