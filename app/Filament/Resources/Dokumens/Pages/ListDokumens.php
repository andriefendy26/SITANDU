<?php

namespace App\Filament\Resources\Dokumens\Pages;

use App\Filament\Resources\Dokumens\DokumenResource;
use App\Filament\Resources\Dokumens\Widgets\DocumensStats;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDokumens extends ListRecords
{
    protected static string $resource = DokumenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            DocumensStats::class,
        ];
    }
}
