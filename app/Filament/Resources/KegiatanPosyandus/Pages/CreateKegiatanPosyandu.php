<?php

namespace App\Filament\Resources\KegiatanPosyandus\Pages;

use App\Filament\Resources\KegiatanPosyandus\KegiatanPosyanduResource;
use Filament\Resources\Pages\CreateRecord;

class CreateKegiatanPosyandu extends CreateRecord
{
    protected static string $resource = KegiatanPosyanduResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['id_user'] = auth()->id();

        return $data;
    }

}
