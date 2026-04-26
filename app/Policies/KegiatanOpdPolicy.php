<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\KegiatanOpd;
use Illuminate\Auth\Access\HandlesAuthorization;

class KegiatanOpdPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:KegiatanOpd');
    }

    public function view(AuthUser $authUser, KegiatanOpd $kegiatanOpd): bool
    {
        return $authUser->can('View:KegiatanOpd');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:KegiatanOpd');
    }

    public function update(AuthUser $authUser, KegiatanOpd $kegiatanOpd): bool
    {
        return $authUser->can('Update:KegiatanOpd');
    }

    public function delete(AuthUser $authUser, KegiatanOpd $kegiatanOpd): bool
    {
        return $authUser->can('Delete:KegiatanOpd');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:KegiatanOpd');
    }

    public function restore(AuthUser $authUser, KegiatanOpd $kegiatanOpd): bool
    {
        return $authUser->can('Restore:KegiatanOpd');
    }

    public function forceDelete(AuthUser $authUser, KegiatanOpd $kegiatanOpd): bool
    {
        return $authUser->can('ForceDelete:KegiatanOpd');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:KegiatanOpd');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:KegiatanOpd');
    }

    public function replicate(AuthUser $authUser, KegiatanOpd $kegiatanOpd): bool
    {
        return $authUser->can('Replicate:KegiatanOpd');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:KegiatanOpd');
    }

}