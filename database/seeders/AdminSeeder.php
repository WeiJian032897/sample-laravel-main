<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create or get Administrator role
        $role = Role::firstOrCreate(['name' => 'administrator']);

        // Create admin user
        Admin::updateOrCreate(
            ['email' => 'admin@comp.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'role_id' => $role->id,
            ]
        );

        Admin::factory()
            ->count(5)
            ->create([
                'role_id' => $role->id,
            ]);
    }
}
