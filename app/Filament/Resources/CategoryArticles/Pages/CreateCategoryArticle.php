<?php

namespace App\Filament\Resources\CategoryArticles\Pages;

use App\Filament\Resources\CategoryArticles\CategoryArticleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCategoryArticle extends CreateRecord
{
    protected static string $resource = CategoryArticleResource::class;
}
