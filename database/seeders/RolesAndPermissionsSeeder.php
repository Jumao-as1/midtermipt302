<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $admin = Role::firstOrCreate(['name' => 'Administrator']);
        $dataEntry = Role::firstOrCreate(['name' => 'Data Entry']);

        // Create permissions
        Permission::firstOrCreate(['name' => 'create record']);
        Permission::firstOrCreate(['name' => 'edit record']);
        Permission::firstOrCreate(['name' => 'delete record']);

        // Assign permissions to roles
        $admin->givePermissionTo(['create record', 'edit record', 'delete record']);
        $dataEntry->givePermissionTo('create record');

        // Create admin user
        $adminUser = User::firstOrCreate([
            'email' => 'admin@example.com'
        ], [
            'name' => 'Admin User',
            'password' => Hash::make('admin123')
        ]);

        $adminUser->assignRole($admin);

        // Create regular user
        $regularUser = User::firstOrCreate([
            'email' => 'user@example.com'
        ], [
            'name' => 'Regular User',
            'password' => Hash::make('user123')
        ]);

        $regularUser->assignRole($dataEntry);
    }
}
