<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\KategoriKegiatanOpd;
use Illuminate\Auth\Access\HandlesAuthorization;

class KategoriKegiatanOpdPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:KategoriKegiatanOpd');
    }

    public function view(AuthUser $authUser, KategoriKegiatanOpd $kategoriKegiatanOpd): bool
    {
        return $authUser->can('View:KategoriKegiatanOpd');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:KategoriKegiatanOpd');
    }

    public function update(AuthUser $authUser, KategoriKegiatanOpd $kategoriKegiatanOpd): bool
    {
        return $authUser->can('Update:KategoriKegiatanOpd');
    }

    public function delete(AuthUser $authUser, KategoriKegiatanOpd $kategoriKegiatanOpd): bool
    {
        return $authUser->can('Delete:KategoriKegiatanOpd');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:KategoriKegiatanOpd');
    }

    public function restore(AuthUser $authUser, KategoriKegiatanOpd $kategoriKegiatanOpd): bool
    {
        return $authUser->can('Restore:KategoriKegiatanOpd');
    }

    public function forceDelete(AuthUser $authUser, KategoriKegiatanOpd $kategoriKegiatanOpd): bool
    {
        return $authUser->can('ForceDelete:KategoriKegiatanOpd');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:KategoriKegiatanOpd');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:KategoriKegiatanOpd');
    }

    public function replicate(AuthUser $authUser, KategoriKegiatanOpd $kategoriKegiatanOpd): bool
    {
        return $authUser->can('Replicate:KategoriKegiatanOpd');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:KategoriKegiatanOpd');
    }

}