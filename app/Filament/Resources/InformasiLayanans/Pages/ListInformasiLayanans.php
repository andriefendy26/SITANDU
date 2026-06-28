<?php

namespace App\Filament\Resources\InformasiLayanans\Pages;

use App\Filament\Resources\InformasiLayanans\InformasiLayananResource;
use App\Filament\Resources\InformasiLayanans\Widgets\InformasiLayanansStats;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListInformasiLayanans extends ListRecords
{
    protected static string $resource = InformasiLayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            InformasiLayanansStats::class,
        ];
    }
}
