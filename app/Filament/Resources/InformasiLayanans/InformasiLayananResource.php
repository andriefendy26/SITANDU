<?php

namespace App\Filament\Resources\InformasiLayanans;

use App\Filament\Resources\InformasiLayanans\Pages\CreateInformasiLayanan;
use App\Filament\Resources\InformasiLayanans\Pages\EditInformasiLayanan;
use App\Filament\Resources\InformasiLayanans\Pages\ListInformasiLayanans;
use App\Filament\Resources\InformasiLayanans\Schemas\InformasiLayananForm;
use App\Filament\Resources\InformasiLayanans\Tables\InformasiLayanansTable;
use App\Models\InformasiLayanan;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class InformasiLayananResource extends Resource
{
    protected static ?string $model = InformasiLayanan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string |UnitEnum| null $navigationGroup = 'Informasi Layanan';

    protected static ?string $recordTitleAttribute = 'InformasiLayanan';

    public static function form(Schema $schema): Schema
    {
        return InformasiLayananForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InformasiLayanansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListInformasiLayanans::route('/'),
            'create' => CreateInformasiLayanan::route('/create'),
            'edit' => EditInformasiLayanan::route('/{record}/edit'),
        ];
    }
}
