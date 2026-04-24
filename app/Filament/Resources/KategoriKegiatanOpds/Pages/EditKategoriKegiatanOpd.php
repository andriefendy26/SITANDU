<?php

namespace App\Filament\Resources\KategoriKegiatanOpds\Pages;

use App\Filament\Resources\KategoriKegiatanOpds\KategoriKegiatanOpdResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKategoriKegiatanOpd extends EditRecord
{
    protected static string $resource = KategoriKegiatanOpdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
