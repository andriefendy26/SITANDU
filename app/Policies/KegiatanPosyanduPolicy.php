<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\KegiatanPosyandu;
use Illuminate\Auth\Access\HandlesAuthorization;

class KegiatanPosyanduPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:KegiatanPosyandu');
    }

    public function view(AuthUser $authUser, KegiatanPosyandu $kegiatanPosyandu): bool
    {
        return $authUser->can('View:KegiatanPosyandu');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:KegiatanPosyandu');
    }

    public function update(AuthUser $authUser, KegiatanPosyandu $kegiatanPosyandu): bool
    {
        return $authUser->can('Update:KegiatanPosyandu');
    }

    public function delete(AuthUser $authUser, KegiatanPosyandu $kegiatanPosyandu): bool
    {
        return $authUser->can('Delete:KegiatanPosyandu');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:KegiatanPosyandu');
    }

    public function restore(AuthUser $authUser, KegiatanPosyandu $kegiatanPosyandu): bool
    {
        return $authUser->can('Restore:KegiatanPosyandu');
    }

    public function forceDelete(AuthUser $authUser, KegiatanPosyandu $kegiatanPosyandu): bool
    {
        return $authUser->can('ForceDelete:KegiatanPosyandu');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:KegiatanPosyandu');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:KegiatanPosyandu');
    }

    public function replicate(AuthUser $authUser, KegiatanPosyandu $kegiatanPosyandu): bool
    {
        return $authUser->can('Replicate:KegiatanPosyandu');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:KegiatanPosyandu');
    }

}