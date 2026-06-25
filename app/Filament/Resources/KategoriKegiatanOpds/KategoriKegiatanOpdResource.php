<?php

namespace App\Filament\Resources\KategoriKegiatanOpds;

use App\Filament\Resources\KategoriKegiatanOpds\Pages\CreateKategoriKegiatanOpd;
use App\Filament\Resources\KategoriKegiatanOpds\Pages\EditKategoriKegiatanOpd;
use App\Filament\Resources\KategoriKegiatanOpds\Pages\ListKategoriKegiatanOpds;
use App\Filament\Resources\KategoriKegiatanOpds\Schemas\KategoriKegiatanOpdForm;
use App\Filament\Resources\KategoriKegiatanOpds\Tables\KategoriKegiatanOpdsTable;
use App\Models\KategoriKegiatanOpd;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KategoriKegiatanOpdResource extends Resource
{
    protected static ?string $model = KategoriKegiatanOpd::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string |UnitEnum| null $navigationGroup = 'Kegiatan OPD';

    protected static ?string $recordTitleAttribute = 'KategoriKegiatanOpd';

    public static function form(Schema $schema): Schema
    {
        return KategoriKegiatanOpdForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KategoriKegiatanOpdsTable::configure($table);
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
            'index' => ListKategoriKegiatanOpds::route('/'),
            'create' => CreateKategoriKegiatanOpd::route('/create'),
            'edit' => EditKategoriKegiatanOpd::route('/{record}/edit'),
        ];
    }
}
