<?php

namespace App\Filament\Resources\CategoryArticles\Pages;

use App\Filament\Resources\CategoryArticles\CategoryArticleResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCategoryArticle extends ViewRecord
{
    protected static string $resource = CategoryArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
