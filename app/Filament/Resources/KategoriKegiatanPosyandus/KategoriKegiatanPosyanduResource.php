<?php

namespace App\Filament\Resources\KategoriKegiatanPosyandus;

use App\Filament\Resources\KategoriKegiatanPosyandus\Pages\CreateKategoriKegiatanPosyandu;
use App\Filament\Resources\KategoriKegiatanPosyandus\Pages\EditKategoriKegiatanPosyandu;
use App\Filament\Resources\KategoriKegiatanPosyandus\Pages\ListKategoriKegiatanPosyandus;
use App\Filament\Resources\KategoriKegiatanPosyandus\Schemas\KategoriKegiatanPosyanduForm;
use App\Filament\Resources\KategoriKegiatanPosyandus\Tables\KategoriKegiatanPosyandusTable;
use App\Models\KategoriKegiatanPosyandu;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

use App\Filament\Clusters\Master\MasterCluster;

class KategoriKegiatanPosyanduResource extends Resource
{
    protected static ?string $model = KategoriKegiatanPosyandu::class;
    protected static ?string $cluster = MasterCluster::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string |UnitEnum| null $navigationGroup = 'Kegiatan Posyandu';
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return KategoriKegiatanPosyanduForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KategoriKegiatanPosyandusTable::configure($table);
    }

    public static function getPluralLabel(): string
    {
        return 'Kategori';
    }

    public static function getRelations(): array
    {
        return [
            //
            RelationManagers\KegiatanPosyanduRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListKategoriKegiatanPosyandus::route('/'),
            'create' => CreateKategoriKegiatanPosyandu::route('/create'),
            'edit' => EditKategoriKegiatanPosyandu::route('/{record}/edit'),
        ];
    }
}
