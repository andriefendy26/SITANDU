<?php

namespace App\Filament\Resources\KegiatanOpds\Pages;

use App\Filament\Resources\KegiatanOpds\KegiatanOpdResource;
use Filament\Resources\Pages\CreateRecord;

class CreateKegiatanOpd extends CreateRecord
{
    protected static string $resource = KegiatanOpdResource::class;
    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['id_user'] = auth()->id();

        return $data;
    }

}
