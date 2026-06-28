<?php
// app/Filament/Resources/Units/Widgets/UnitSummaryTableWidget.php

namespace App\Filament\Resources\Units\Widgets;

use App\Models\Unit;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class UnitSummaryTableWidget extends BaseWidget
{
    protected static ?string $heading = 'Rekap Dokumen & Kegiatan Per Unit';

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Unit::withCount(['users','dokumen', 'kegiatanOpd', 'kegiatanPosyandu'])
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Unit / Dinas')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('users_count')
                    ->label('Pengguna')
                    ->badge()
                    ->color('info')
                    ->sortable(),

                Tables\Columns\TextColumn::make('dokumen_count')
                    ->label('Dokumen')
                    ->badge()
                    ->color('success')
                    ->sortable(),

                Tables\Columns\TextColumn::make('kegiatan_opd_count')
                    ->label('Kegiatan OPD')
                    ->badge()
                    ->color('warning')
                    ->sortable(),

                Tables\Columns\TextColumn::make('kegiatan_posyandu_count')
                    ->label('Kegiatan Posyandu')
                    ->badge()
                    ->color('danger')
                    ->sortable(),
            ]);
    }
}