<?php

namespace App\Filament\Resources\Dokumens;

use App\Filament\Resources\Dokumens\Pages\CreateDokumen;
use App\Filament\Resources\Dokumens\Pages\EditDokumen;
use App\Filament\Resources\Dokumens\Pages\ListDokumens;
use App\Filament\Resources\Dokumens\Schemas\DokumenForm;
use App\Filament\Resources\Dokumens\Tables\DokumensTable;
use App\Models\Dokumen;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class DokumenResource extends Resource
{
    protected static ?string $model = Dokumen::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentArrowDown;
    protected static string |UnitEnum| null $navigationGroup = 'Arsip Dokumen';

    protected static ?string $recordTitleAttribute = 'Dokumen';

    public static function form(Schema $schema): Schema
    {
        return DokumenForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DokumensTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPluralLabel(): string
    {
        return 'Dokumen';
    }

    // public static function getEloquentQuery(): Builder
    // {
    //     $query = parent::getEloquentQuery();
    //     $user = auth()->user();

    //     // Jika bukan super_admin, tampilkan hanya dokumen milik sendiri
    //     if (! auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('Pengunjung')   || $user->can('ViewAny:Dokumen')) {
    //         $query->where('id_user', auth()->id());
    //     }

    //     return $query;
    // }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        $user = auth()->user();

        if (! $user) {
            return $query;
        }

        if ($user->hasRole('super_admin') || $user->can('ViewAny:Dokumen')) {
            return $query;
        }

        return $query->where('id_user', $user->id);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDokumens::route('/'),
            'create' => CreateDokumen::route('/create'),
            'edit' => EditDokumen::route('/{record}/edit'),
        ];
    }
}
