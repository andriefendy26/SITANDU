<?php
// app/Filament/Resources/Units/Pages/ViewUnit.php

namespace App\Filament\Resources\Units\Pages;

use App\Filament\Resources\Units\UnitResource;
use App\Filament\Resources\Units\Widgets\UnitDokumenStatsWidget;
use Filament\Resources\Pages\ViewRecord;

class ViewUnit extends ViewRecord
{
    protected static string $resource = UnitResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            UnitDokumenStatsWidget::make([
                'unitId' => $this->record->id,
            ]),
        ];
    }
}