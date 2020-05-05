<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        $role = Role::create([
            'name' => 'super administrator', 
            'color' => 'red darken-2'
        ]);

        Role::create([
            'name' => 'administrator',
            'color' => 'blue darken-4'
        ]);

        $permissions = [
            'create users',
            'read users',
            'update users',
            'archive users',
            'restore users',
            'delete users',
            'impersonate users'
        ];

        foreach($permissions as $data) {
            Permission::create(['name' => $data]);
        }

        $role->givePermissionTo(Permission::all());
        
        User::create([
            'name' => 'Carlo Miguel Dy',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ])->assignRole($role);
    }
}
