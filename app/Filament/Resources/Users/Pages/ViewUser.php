<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use App\Filament\Widgets\DokumenUserStatsWidget;
// use Filament\Infolists;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;

use App\Filament\Resources\Users\RelationManagers\DokumenRelationManager;

// Schema
use Filament\Schemas\Components\Section;
use Filament\Resources\RelationManagers\RelationManagersSchemaComponent;

// Table
use Filament\Tables\Columns\TextColumn;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         EditAction::make(),
    //     ];
    // }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // ...
                TextColumn::make('title'),
            ])
            ->recordActions([
                ViewAction::make(),
                // ...
            ]);
    }

    protected function getHeaderWidgets(): array
    {
        return [
            DokumenUserStatsWidget::make([
                'userId' => $this->record->id,
            ]),
        ];
    }

    public function getRelationManagers(): array
    {
        return [
            DokumenRelationManager::class,
        ];
    }

    public function content(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make("Dokumen User")
                    ->schema([
                        $this->getRelationManagersContentComponent(),
                    ])
            
        ]);
    }
    
    // protected function getFooterWidgets(): array
    // {
    //     return [
    //         DokumenUserStatsWidget::make([
    //             'userId' => $this->record->id,
    //         ]),
    //     ];
    // }
}
