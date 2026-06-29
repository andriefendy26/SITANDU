<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class UserForm
{
    public static function configure(Schema $schema): Schema
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
                    ->required()
                    ->belowContent('Pilih unit kerja pengguna. Jika unit belum tersedia, tambahkan unit baru terlebih dahulu.')
                    ->preload()
                    ->searchable(),

                Select::make('roles')
                    ->label('Roles')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload()
                    ->required()
                    ->searchable()
                    ->belowContent('Pilih satu atau lebih role pengguna sesuai hak akses yang diberikan.'),
            ]);
    }
}