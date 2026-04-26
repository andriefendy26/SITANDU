<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\InformasiLayanan;
use Illuminate\Auth\Access\HandlesAuthorization;

class InformasiLayananPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:InformasiLayanan');
    }

    public function view(AuthUser $authUser, InformasiLayanan $informasiLayanan): bool
    {
        return $authUser->can('View:InformasiLayanan');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:InformasiLayanan');
    }

    public function update(AuthUser $authUser, InformasiLayanan $informasiLayanan): bool
    {
        return $authUser->can('Update:InformasiLayanan');
    }

    public function delete(AuthUser $authUser, InformasiLayanan $informasiLayanan): bool
    {
        return $authUser->can('Delete:InformasiLayanan');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:InformasiLayanan');
    }

    public function restore(AuthUser $authUser, InformasiLayanan $informasiLayanan): bool
    {
        return $authUser->can('Restore:InformasiLayanan');
    }

    public function forceDelete(AuthUser $authUser, InformasiLayanan $informasiLayanan): bool
    {
        return $authUser->can('ForceDelete:InformasiLayanan');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:InformasiLayanan');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:InformasiLayanan');
    }

    public function replicate(AuthUser $authUser, InformasiLayanan $informasiLayanan): bool
    {
        return $authUser->can('Replicate:InformasiLayanan');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:InformasiLayanan');
    }

}