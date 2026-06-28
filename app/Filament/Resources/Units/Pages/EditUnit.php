<?php

namespace App\Filament\Resources\Units\Pages;

use App\Filament\Resources\Units\UnitResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\Units\Widgets\UnitDokumenStatsWidget;

class EditUnit extends EditRecord
{
    protected static string $resource = UnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    //  protected function getHeaderWidgets(): array
    // {
    //     return [
    //         UnitDokumenStatsWidget::make([
    //             'unitId' => $this->record->id,
    //         ]),
    //     ];
    // }
}
