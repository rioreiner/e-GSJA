<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Create Super Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@gsja.com'],
            [
                'name'     => 'Administrator',
                'password' => Hash::make('password'),
            ]
        );
        $admin->assignRole('admin');

        // Create Bendahara
        $bendahara = User::firstOrCreate(
            ['email' => 'bendahara@gsja.com'],
            [
                'name'     => 'Bendahara Gereja',
                'password' => Hash::make('password'),
            ]
        );
        $bendahara->assignRole('bendahara');

        // Create Sample Jemaat User
        $jemaat = User::firstOrCreate(
            ['email' => 'jemaat@gsja.com'],
            [
                'name'     => 'Anggota Jemaat',
                'password' => Hash::make('password'),
            ]
        );
        $jemaat->assignRole('jemaat');

        $this->command->info('Default users created:');
        $this->command->info('Admin    : admin@gsja.com / password');
        $this->command->info('Bendahara: bendahara@gsja.com / password');
        $this->command->info('Jemaat   : jemaat@gsja.com / password');
    }
}