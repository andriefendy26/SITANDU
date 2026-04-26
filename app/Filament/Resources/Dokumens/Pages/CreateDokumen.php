<?php

namespace App\Filament\Resources\Dokumens\Pages;

use App\Filament\Resources\Dokumens\DokumenResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDokumen extends CreateRecord
{
    protected static string $resource = DokumenResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['id_user'] = auth()->id();

        return $data;
    }

}
