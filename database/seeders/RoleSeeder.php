<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [

            'dashboard.view',

            'jemaat.view',
            'jemaat.create',
            'jemaat.edit',
            'jemaat.delete',
            'jemaat.export',

            'keuangan.view',
            'keuangan.create',
            'keuangan.edit',
            'keuangan.delete',
            'keuangan.export',

            'jadwal.view',
            'jadwal.create',
            'jadwal.edit',
            'jadwal.delete',

            'pelayanan.view',
            'pelayanan.create',
            'pelayanan.edit',
            'pelayanan.delete',

            'post.view',
            'post.create',
            'post.edit',
            'post.delete',

            'event.view',
            'event.create',
            'event.edit',
            'event.delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web'
            ]);
        }

        $admin = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        $bendahara = Role::firstOrCreate([
            'name' => 'bendahara',
            'guard_name' => 'web'
        ]);

        $jemaat = Role::firstOrCreate([
            'name' => 'jemaat',
            'guard_name' => 'web'
        ]);

        /*
        |--------------------------------------------------------------------------
        | ADMIN
        |--------------------------------------------------------------------------
        */

        $admin->syncPermissions(Permission::all());

        /*
        |--------------------------------------------------------------------------
        | BENDAHARA
        |--------------------------------------------------------------------------
        */

        $bendahara->syncPermissions([
            'dashboard.view',

            'keuangan.view',
            'keuangan.create',
            'keuangan.edit',
            'keuangan.delete',
            'keuangan.export',

            'jadwal.view',
            'pelayanan.view',
            'post.view',
            'event.view',
        ]);

        /*
        |--------------------------------------------------------------------------
        | JEMAAT
        |--------------------------------------------------------------------------
        */

        $jemaat->syncPermissions([
            'dashboard.view',

            'jadwal.view',
            'post.view',
            'event.view',
        ]);

        /*
        |--------------------------------------------------------------------------
        | ADMIN USER
        |--------------------------------------------------------------------------
        */

        $user = User::first();

        if ($user) {
            $user->assignRole('admin');
        }

        $this->command->info('Role & Permission berhasil dibuat.');
    }
}