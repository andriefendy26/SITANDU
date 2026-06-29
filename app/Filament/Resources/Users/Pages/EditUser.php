<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

     public function form(Schema $schema): Schema
    {
        return $schema
        ->schema([
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
                    ->dehydrateStateUsing(fn ($state) => bcrypt($state))
                    ->dehydrated(fn ($state) => filled($state)) // ✅ hanya simpan jika diisi
                    ->nullable()
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

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
