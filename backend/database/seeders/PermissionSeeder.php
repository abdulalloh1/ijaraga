<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guard = 'api';
        $config = config('permissions');

        // Создание ролей
        foreach ($config['roles'] as $roleName) {
            Role::firstOrCreate(['name' => $roleName, 'guard_name' => $guard]);
        }

        // Создание прав
        foreach ($config['permissions'] as $group => $perms) {
            foreach ($perms as $perm) {
                $fullName = "{$group}.{$perm}";
                Permission::firstOrCreate([
                    'name' => $fullName,
                    'guard_name' => $guard,
                ]);
            }
        }

        // Назначение прав ролям
        foreach ($config['role_permissions'] as $role => $permList) {
            $roleModel = Role::findByName($role, $guard);

            if ($permList === '*') {
                $roleModel->givePermissionTo(Permission::all());
            } else {
                $roleModel->givePermissionTo($permList);
            }
        }
    }
}
