<?php

namespace App\Filament\Resources\KegiatanPosyandus;

use App\Filament\Resources\KegiatanPosyandus\Pages\CreateKegiatanPosyandu;
use App\Filament\Resources\KegiatanPosyandus\Pages\EditKegiatanPosyandu;
use App\Filament\Resources\KegiatanPosyandus\Pages\ListKegiatanPosyandus;
use App\Filament\Resources\KegiatanPosyandus\Schemas\KegiatanPosyanduForm;
use App\Filament\Resources\KegiatanPosyandus\Tables\KegiatanPosyandusTable;
use App\Models\KegiatanPosyandu;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KegiatanPosyanduResource extends Resource
{
    protected static ?string $model = KegiatanPosyandu::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string |UnitEnum| null $navigationGroup = 'Kegiatan Posyandu';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return KegiatanPosyanduForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KegiatanPosyandusTable::configure($table);
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
            'index' => ListKegiatanPosyandus::route('/'),
            'create' => CreateKegiatanPosyandu::route('/create'),
            'edit' => EditKegiatanPosyandu::route('/{record}/edit'),
        ];
    }
}
