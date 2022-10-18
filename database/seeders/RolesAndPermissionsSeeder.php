<?php

namespace Database\Seeders;

use App\Helpers\UserHelper;
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


//        Role::unguard();
//
//        $role = Role::create([
//            'id' => UserHelper::ROLE_GUEST,
//            'name' => 'guest'
//        ]);
//        $role->givePermissionTo(['place order']);

        Role::create([
            'id' => UserHelper::ROLE_SUPER_ADMIN,
            'name' => 'super-admin'
        ])->givePermissionTo(Permission::all());


        // this can be done as separate statements
        $role = Role::create([
            'id' => UserHelper::ROLE_ADMIN,
            'name' => 'admin'
        ]);
        $role->givePermissionTo('edit products', 'delete products', 'publish products', 'update products');

        // or may be done by chaining
        $role = Role::create([
            'id' => UserHelper::ROLE_CUSTOMER,
            'name' => 'customer'
        ]);
        $role->givePermissionTo(['place order']);
    }
}
