<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\KategoriKegiatanPosyandu;
use Illuminate\Auth\Access\HandlesAuthorization;

class KategoriKegiatanPosyanduPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:KategoriKegiatanPosyandu');
    }

    public function view(AuthUser $authUser, KategoriKegiatanPosyandu $kategoriKegiatanPosyandu): bool
    {
        return $authUser->can('View:KategoriKegiatanPosyandu');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:KategoriKegiatanPosyandu');
    }

    public function update(AuthUser $authUser, KategoriKegiatanPosyandu $kategoriKegiatanPosyandu): bool
    {
        return $authUser->can('Update:KategoriKegiatanPosyandu');
    }

    public function delete(AuthUser $authUser, KategoriKegiatanPosyandu $kategoriKegiatanPosyandu): bool
    {
        return $authUser->can('Delete:KategoriKegiatanPosyandu');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:KategoriKegiatanPosyandu');
    }

    public function restore(AuthUser $authUser, KategoriKegiatanPosyandu $kategoriKegiatanPosyandu): bool
    {
        return $authUser->can('Restore:KategoriKegiatanPosyandu');
    }

    public function forceDelete(AuthUser $authUser, KategoriKegiatanPosyandu $kategoriKegiatanPosyandu): bool
    {
        return $authUser->can('ForceDelete:KategoriKegiatanPosyandu');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:KategoriKegiatanPosyandu');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:KategoriKegiatanPosyandu');
    }

    public function replicate(AuthUser $authUser, KategoriKegiatanPosyandu $kategoriKegiatanPosyandu): bool
    {
        return $authUser->can('Replicate:KategoriKegiatanPosyandu');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:KategoriKegiatanPosyandu');
    }

}