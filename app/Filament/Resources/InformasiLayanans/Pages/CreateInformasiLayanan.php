<?php

namespace App\Filament\Resources\InformasiLayanans\Pages;

use App\Filament\Resources\InformasiLayanans\InformasiLayananResource;
use Filament\Resources\Pages\CreateRecord;

class CreateInformasiLayanan extends CreateRecord
{
    protected static string $resource = InformasiLayananResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['id_user'] = auth()->id();

        return $data;
    }

}
