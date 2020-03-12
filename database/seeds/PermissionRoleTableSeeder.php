<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        // Admin permission (All)
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        // Moderator permissions (Unable to change roles, permissions or audits)
        $moderator_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_' && substr($permission->title, 0, 6) != 'audit_';
        });
        Role::findOrFail(2)->permissions()->sync($moderator_permissions);

        $client_permissions = $moderator_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_';
        });
        Role::findOrFail(3)->permissions()->sync($client_permissions)

    }
}
