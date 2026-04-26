<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\CategoryArticle;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryArticlePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:CategoryArticle');
    }

    public function view(AuthUser $authUser, CategoryArticle $categoryArticle): bool
    {
        return $authUser->can('View:CategoryArticle');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:CategoryArticle');
    }

    public function update(AuthUser $authUser, CategoryArticle $categoryArticle): bool
    {
        return $authUser->can('Update:CategoryArticle');
    }

    public function delete(AuthUser $authUser, CategoryArticle $categoryArticle): bool
    {
        return $authUser->can('Delete:CategoryArticle');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:CategoryArticle');
    }

    public function restore(AuthUser $authUser, CategoryArticle $categoryArticle): bool
    {
        return $authUser->can('Restore:CategoryArticle');
    }

    public function forceDelete(AuthUser $authUser, CategoryArticle $categoryArticle): bool
    {
        return $authUser->can('ForceDelete:CategoryArticle');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:CategoryArticle');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:CategoryArticle');
    }

    public function replicate(AuthUser $authUser, CategoryArticle $categoryArticle): bool
    {
        return $authUser->can('Replicate:CategoryArticle');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:CategoryArticle');
    }

}