<?php

namespace App\Filament\Resources\KegiatanOpds\Pages;

use App\Filament\Resources\KegiatanOpds\KegiatanOpdResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKegiatanOpd extends EditRecord
{
    protected static string $resource = KegiatanOpdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
