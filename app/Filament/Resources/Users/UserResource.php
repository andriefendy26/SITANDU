<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\ViewUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Filament\Resources\Users\Schemas\UserForm;
use App\Filament\Resources\Users\Tables\UsersTable;
use UnitEnum;
use BackedEnum;
use App\Models\User;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
// use User;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::UserCircle;
    protected static string |UnitEnum| null $navigationGroup = 'Users Settings';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return UserForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UsersTable::configure($table)
                // ->recordUrl(
                //     fn(User $record) => static::getUrl('view', ['record' => $record])
                // )
                ;
    }

    public static function getPluralLabel(): string
    {
        return 'Pengguna';
    }

    public static function getRelations(): array
    {
        return [
            //
            RelationManagers\DokumenRelationManager::class
        ];
    }
    

    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
            'view' => Pages\ViewUser::route('/{record}'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}
