<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\KategoriLayanan;
use Illuminate\Auth\Access\HandlesAuthorization;

class KategoriLayananPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:KategoriLayanan');
    }

    public function view(AuthUser $authUser, KategoriLayanan $kategoriLayanan): bool
    {
        return $authUser->can('View:KategoriLayanan');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:KategoriLayanan');
    }

    public function update(AuthUser $authUser, KategoriLayanan $kategoriLayanan): bool
    {
        return $authUser->can('Update:KategoriLayanan');
    }

    public function delete(AuthUser $authUser, KategoriLayanan $kategoriLayanan): bool
    {
        return $authUser->can('Delete:KategoriLayanan');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:KategoriLayanan');
    }

    public function restore(AuthUser $authUser, KategoriLayanan $kategoriLayanan): bool
    {
        return $authUser->can('Restore:KategoriLayanan');
    }

    public function forceDelete(AuthUser $authUser, KategoriLayanan $kategoriLayanan): bool
    {
        return $authUser->can('ForceDelete:KategoriLayanan');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:KategoriLayanan');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:KategoriLayanan');
    }

    public function replicate(AuthUser $authUser, KategoriLayanan $kategoriLayanan): bool
    {
        return $authUser->can('Replicate:KategoriLayanan');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:KategoriLayanan');
    }

}