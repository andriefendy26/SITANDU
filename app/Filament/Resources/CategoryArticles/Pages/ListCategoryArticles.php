<?php

namespace App\Filament\Resources\CategoryArticles\Pages;

use App\Filament\Resources\CategoryArticles\CategoryArticleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCategoryArticles extends ListRecords
{
    protected static string $resource = CategoryArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
