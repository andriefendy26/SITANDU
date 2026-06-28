<?php

namespace App\Filament\Resources\Units\RelationManagers;

use App\Filament\Resources\Units\UnitResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fileupload;
use Filament\Schemas\Components\Section;

use Filament\Schemas\Schema;

class UsersRelationManager extends RelationManager
{
    protected static string $relationship = 'users';

    protected static ?string $relatedResource = UnitResource::class;
    protected static ?string $title = 'Pengguna';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255)
                    ->belowContent('Masukkan nama lengkap pengguna sesuai identitas.'),

                TextInput::make('email')
                    ->label('Email')
                    // ->required()
                    ->maxLength(255)
                    ->email()
                    ->belowContent('Masukkan alamat email aktif pengguna. Contoh: user@example.com.'),

                TextInput::make('username')
                    ->label('Username')
                    ->required()
                    ->maxLength(255)
                    ->belowContent('Masukkan username unik yang akan digunakan untuk login.'),

                TextInput::make('password')
                    ->label('Password')
                    ->required()
                    ->maxLength(255)
                    ->password()
                    ->belowContent('Masukkan password akun pengguna. Gunakan kombinasi huruf, angka, dan simbol agar lebih aman.'),

                Select::make('id_unit')
                    ->label('Unit')
                    ->relationship('units', 'name')
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('Nama Unit')
                            ->required()
                            ->maxLength(255)
                            ->belowContent('Masukkan nama unit kerja secara lengkap. Contoh: Dinas Komunikasi dan Informatika.'),
                    ])
                    ->belowContent('Pilih unit kerja pengguna. Jika unit belum tersedia, tambahkan unit baru terlebih dahulu.')
                    ->preload()
                    ->searchable(),

                Select::make('roles')
                    ->label('Roles')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->belowContent('Pilih satu atau lebih role pengguna sesuai hak akses yang diberikan.'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }

    public static function getPluralLabel(): string
    {
        return 'Users';
    }
}
