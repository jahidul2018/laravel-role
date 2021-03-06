<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role seed
        // Create Roles
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'user']);
        $roleEditor = Role::create(['name' => 'subadmin']);
        $roleEditor = Role::create(['name' => 'manager']);
        $roleEditor = Role::create(['name' => 'developer']);
        $roleEditor = Role::create(['name' => 'juniordeveloper']);
        $roleEditor = Role::create(['name' => 'master']);




        //without grouping
        // // Permission List as array
        // $permissions = [

        //     // Dashboard
        //     'dashboard.view',

        //     // Blog Permissions
        //     'blog.create',
        //     'blog.view',
        //     'blog.edit',
        //     'blog.delete',
        //     'blog.approve',

        //     // Admin Permissions
        //     'admin.create',
        //     'admin.view',
        //     'admin.edit',
        //     'admin.delete',
        //     'admin.approve',

        //     // Role Permissions
        //     'role.create',
        //     'role.view',
        //     'role.edit',
        //     'role.delete',
        //     'role.approve',

        //     // Profile Permissions
        //     'profile.view',
        //     'profile.edit'
        // ];


        // // Create and Assign Permissions
        // //
        // for ($i = 0; $i < count($permissions); $i++) {
        //     // Create Permission
        //     $permission = Permission::create(['name' => $permissions[$i]]);
        //     $roleSuperAdmin->givePermissionTo($permission);
        //     $permission->assignRole($roleSuperAdmin);
        // }

                // Permission List as array
                $permissions = [

                    [
                        'group_name' => 'dashboard',
                        'permissions' => [
                            'dashboard.view',
                            'dashboard.edit',
                        ]
                    ],
                    [
                        'group_name' => 'blog',
                        'permissions' => [
                            // Blog Permissions
                            'blog.create',
                            'blog.view',
                            'blog.edit',
                            'blog.delete',
                            'blog.approve',
                        ]
                    ],
                    [
                        'group_name' => 'admin',
                        'permissions' => [
                            // admin Permissions
                            'admin.create',
                            'admin.view',
                            'admin.edit',
                            'admin.delete',
                            'admin.approve',
                        ]
                    ],
                    [
                        'group_name' => 'role',
                        'permissions' => [
                            // role Permissions
                            'role.create',
                            'role.view',
                            'role.edit',
                            'role.delete',
                            'role.approve',
                        ]
                    ],
                    [
                        'group_name' => 'profile',
                        'permissions' => [
                            // profile Permissions
                            'profile.view',
                            'profile.edit',
                        ]
                    ],
                ];


                // Create and Assign Permissions
                for ($i = 0; $i < count($permissions); $i++) {
                    $permissionGroup = $permissions[$i]['group_name'];
                    for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                        // Create Permission
                        $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                        $roleSuperAdmin->givePermissionTo($permission);
                        $permission->assignRole($roleSuperAdmin);
                    }
                }
    }

}
