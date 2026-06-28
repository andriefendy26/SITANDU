<?php

namespace App\Filament\Resources\Units\Pages;

use App\Filament\Resources\Units\UnitResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Units\Widgets\UnitStatsWidget;
use App\Filament\Resources\Units\Widgets\UnitSummaryTableWidget;

class ListUnits extends ListRecords
{
    protected static string $resource = UnitResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            UnitStatsWidget::class,
            UnitSummaryTableWidget::class,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            // CreateAction::make(),
        ];
    }
}
