<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
            ['name' => 'super-admin', 'guard_name' => 'web'],
            ['name' => 'army', 'guard_name' => 'web'],
            ['name' => 'user', 'guard_name' => 'web']
        );

        foreach ($roles as $role) Role::create($role);

        $permissions = array(
            ['name' => 'army-delete', 'guard_name' => 'web'],
            ['name' => 'army-edit', 'guard_name' => 'web'],
            ['name' => 'army-add', 'guard_name' => 'web'],
            ['name' => 'army-view', 'guard_name' => 'web'],

            ['name' => 'leave-delete', 'guard_name' => 'web'],
            ['name' => 'leave-edit', 'guard_name' => 'web'],
            ['name' => 'leave-add', 'guard_name' => 'web'],
            ['name' => 'leave-view', 'guard_name' => 'web'],

            ['name' => 'user-delete', 'guard_name' => 'web'],
            ['name' => 'user-edit', 'guard_name' => 'web'],
            ['name' => 'user-add', 'guard_name' => 'web'],
            ['name' => 'user-view', 'guard_name' => 'web'],
        );

        foreach ($permissions as $permission) {
            $per = Permission::create($permission);
            $per->syncRoles(['super-admin']);
        }

        $user_role = Role::where('name', 'user')->firstOrFail();
        $user_role->syncPermissions(['user-delete', 'user-edit', 'user-add']);

        $army_role = Role::where('name', 'army')->firstOrFail();
        $army_role->syncPermissions(['army-delete', 'army-edit', 'army-add']);

    }
}
