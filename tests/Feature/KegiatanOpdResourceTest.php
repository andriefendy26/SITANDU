<?php

use App\Filament\Resources\KegiatanOpds\KegiatanOpdResource;
use App\Models\KategoriKegiatanOpd;
use App\Models\KegiatanOpd;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('shows all records when the user has ViewAny permission', function () {
    $this->withoutExceptionHandling();

    $user = User::factory()->create();
    $otherUser = User::factory()->create();

    $permission = Permission::findOrCreate('ViewAny:KegiatanOpd');
    $role = Role::findOrCreate('editor');
    $role->givePermissionTo($permission);
    $user->assignRole($role);

    $kategori = KategoriKegiatanOpd::create(['name' => 'Test Kategori']);

    KegiatanOpd::create([
        'id_user' => $otherUser->id,
        'id_kategori_kegiatan_opd' => $kategori->id,
        'title' => 'Record 1',
        'content' => 'First record',
    ]);

    KegiatanOpd::create([
        'id_user' => $otherUser->id,
        'id_kategori_kegiatan_opd' => $kategori->id,
        'title' => 'Record 2',
        'content' => 'Second record',
    ]);

    $this->actingAs($user);

    $results = KegiatanOpdResource::getEloquentQuery()->get();

    expect($results)->toHaveCount(2);
});
