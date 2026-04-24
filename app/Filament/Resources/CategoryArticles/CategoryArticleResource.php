<?php

namespace App\Filament\Resources\CategoryArticles;

use App\Filament\Resources\CategoryArticles\Pages\CreateCategoryArticle;
use App\Filament\Resources\CategoryArticles\Pages\EditCategoryArticle;
use App\Filament\Resources\CategoryArticles\Pages\ListCategoryArticles;
use App\Filament\Resources\CategoryArticles\Pages\ViewCategoryArticle;
use App\Filament\Resources\CategoryArticles\Schemas\CategoryArticleForm;
use App\Filament\Resources\CategoryArticles\Schemas\CategoryArticleInfolist;
use App\Filament\Resources\CategoryArticles\Tables\CategoryArticlesTable;
use App\Models\CategoryArticle;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CategoryArticleResource extends Resource
{
    protected static ?string $model = CategoryArticle::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'CategoryArticle';

    public static function form(Schema $schema): Schema
    {
        return CategoryArticleForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CategoryArticleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CategoryArticlesTable::configure($table);
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
            'index' => ListCategoryArticles::route('/'),
            'create' => CreateCategoryArticle::route('/create'),
            'view' => ViewCategoryArticle::route('/{record}'),
            'edit' => EditCategoryArticle::route('/{record}/edit'),
        ];
    }
}
