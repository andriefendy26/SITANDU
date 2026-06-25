<?php

namespace App\Filament\Resources\KegiatanPosyandus\Pages;

use App\Filament\Resources\KegiatanPosyandus\KegiatanPosyanduResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKegiatanPosyandu extends EditRecord
{
    protected static string $resource = KegiatanPosyanduResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
