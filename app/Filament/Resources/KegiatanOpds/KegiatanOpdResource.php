<?php

namespace App\Filament\Resources\KegiatanOpds;

use App\Filament\Resources\KegiatanOpds\Pages\CreateKegiatanOpd;
use App\Filament\Resources\KegiatanOpds\Pages\EditKegiatanOpd;
use App\Filament\Resources\KegiatanOpds\Pages\ListKegiatanOpds;
use App\Filament\Resources\KegiatanOpds\Schemas\KegiatanOpdForm;
use App\Filament\Resources\KegiatanOpds\Tables\KegiatanOpdsTable;
use App\Models\KegiatanOpd;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

use Illuminate\Database\Eloquent\Builder;

class KegiatanOpdResource extends Resource
{
    protected static ?string $model = KegiatanOpd::class;

    // protected static ?string $modelLabel = 'Kegiatan';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string |UnitEnum| null $navigationGroup = 'Kegiatan OPD';
    protected static ?string $recordTitleAttribute = 'KegiatanOpd';

    public static function form(Schema $schema): Schema
    {
        return KegiatanOpdForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KegiatanOpdsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        // Jika bukan super_admin, tampilkan hanya dokumen milik sendiri
        if (! auth()->user()->hasRole('super_admin')) {
            $query->where('id_user', auth()->id());
        }

        return $query;
    }
    

    public static function getPluralLabel(): string
    {
        return 'Kegiatan';
    }

    public static function getPages(): array
    {
        return [
            'index' => ListKegiatanOpds::route('/'),
            'create' => CreateKegiatanOpd::route('/create'),
            'edit' => EditKegiatanOpd::route('/{record}/edit'),
        ];
    }
}
