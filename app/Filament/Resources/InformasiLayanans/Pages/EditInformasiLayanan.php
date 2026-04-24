<?php

namespace App\Filament\Resources\InformasiLayanans\Pages;

use App\Filament\Resources\InformasiLayanans\InformasiLayananResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditInformasiLayanan extends EditRecord
{
    protected static string $resource = InformasiLayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
