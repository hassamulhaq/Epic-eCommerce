<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit products']);
        Permission::create(['name' => 'delete products']);
        Permission::create(['name' => 'publish products']);
        Permission::create(['name' => 'update products']);
        Permission::create(['name' => 'place order']);

        // create roles and assign created permissions

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        Role::create(['name' => 'admin'])
            ->givePermissionTo(['edit products', 'delete products', 'publish products', 'update products']);


        // this can be done as separate statements
        $role = Role::create(['name' => 'customer']);
        $role->givePermissionTo('place order');

        // or may be done by chaining
        $role = Role::create(['name' => 'guest']);
        $role->givePermissionTo(['place order']);
    }
}
