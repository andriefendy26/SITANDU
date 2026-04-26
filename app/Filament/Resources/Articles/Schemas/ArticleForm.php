<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('id_user')
                    ->relationship(name: 'user', titleAttribute: 'name')
                    ->required(),
                    // ->searchable(),
                    // ->numeric(),
                Select::make('id_category_articles')
                    ->relationship(name: 'category', titleAttribute: 'name')
                    ->required(),
                    // ->searchable(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
