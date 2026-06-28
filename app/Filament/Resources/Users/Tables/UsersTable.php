<?php

namespace App\Filament\Resources\Users\Tables;

use App\Models\User;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\IconPosition;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Split::make([
                    Stack::make([
                        TextColumn::make('username')
                            ->searchable()
                            ->badge()
                            ->icon('heroicon-m-user')
                            ->iconPosition(IconPosition::Before),
                        TextColumn::make('email')
                            ->searchable()
                            // ->icon('heroicon-m-envelope')
                            ->iconPosition(IconPosition::Before),
                    ])->alignment(Alignment::Center),
                    Stack::make([
                        TextColumn::make('dokumen_count')
                            ->label('Total Dokumen')
                            ->badge()
                            ->color('info')
                            ->icon('heroicon-m-document-text')
                            ->iconPosition(IconPosition::Before)
                            ->counts('dokumen'),
                        TextColumn::make('units.name')
                            ->label('Unit')
                            ->color('danger')
                            ->badge()
                            ->icon('heroicon-m-building-office')
                            ->iconPosition(IconPosition::Before),
                    ])->alignment(Alignment::End),
                ]),
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->filters([])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ], position: RecordActionsPosition::AfterColumns)
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}