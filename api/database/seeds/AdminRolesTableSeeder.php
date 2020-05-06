<?php

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;

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
            'name' => 'super admin', 
            'color' => 'red darken-2'
        ]);

        Role::create([
            'name' => 'admin',
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
            $permission = Permission::create(['name' => $data]);
        }
        
        // $role->syncPermissions(ModelsPermission::all());
        $role->syncPermissions(Permission::all());
        // $role->givePermissionTo($permission);

        User::create([
            'name' => 'Carlo Miguel Dy',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ])->assignRole($role);
    }
}
