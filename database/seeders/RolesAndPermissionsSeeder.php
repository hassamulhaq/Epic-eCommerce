<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        $userPermission = [
            'CAN_CREATE_USER',
            'CAN_VIEW_USER',
            'CAN_EDIT_USER',
            'CAN_DELETE_USER',
            //'HAS_ALL_USER_PERMISSION',
        ];

        $categoryPermission = [
            'CAN_CREATE_CATEGORY',
            'CAN_VIEW_CATEGORY',
            'CAN_EDIT_CATEGORY',
            'CAN_DELETE_CATEGORY',
            //'HAS_ALL_CATEGORY_PERMISSION',
        ];

        $tagPermission = [
            'CAN_CREATE_TAG',
            'CAN_VIEW_TAG',
            'CAN_EDIT_TAG',
            'CAN_DELETE_TAG',
            //'HAS_ALL_TAG_PERMISSION',
        ];

        $menuPermission = [
            'CAN_CREATE_MENU',
            'CAN_VIEW_MENU',
            'CAN_EDIT_MENU',
            'CAN_DELETE_MENU',
            //'HAS_ALL_MENU_PERMISSION',
        ];

        $productPermission = [
            'CAN_CREATE_PRODUCT',
            'CAN_VIEW_PRODUCT',
            'CAN_EDIT_PRODUCT',
            'CAN_DELETE_PRODUCT',
            //'HAS_ALL_PRODUCT_PERMISSION',
        ];

        $orderPermission = [
            'CAN_CREATE_ORDER',
            'CAN_VIEW_ORDER',
            'CAN_EDIT_ORDER',
            'CAN_DELETE_ORDER',
            //'HAS_ALL_ORDER_PERMISSION',
        ];

        $invoicePermission = [
            'CAN_CREATE_INVOICE',
            'CAN_VIEW_INVOICE',
            'CAN_EDIT_INVOICE',
            'CAN_DELETE_INVOICE',
            //'HAS_ALL_INVOICE_PERMISSION',
        ];

        $specialPermission = [
            'HAS_ALL_USER_PERMISSION',
            'HAS_ALL_CATEGORY_PERMISSION',
            'HAS_ALL_TAG_PERMISSION',
            'HAS_ALL_MENU_PERMISSION',
            'HAS_ALL_PRODUCT_PERMISSION',
            'HAS_ALL_ORDER_PERMISSION',
            'HAS_ALL_INVOICE_PERMISSION',
        ];

        $allPermission = array_merge(
                $userPermission,
                $categoryPermission,
                $tagPermission,
                $menuPermission,
                $productPermission,
                $orderPermission,
                $invoicePermission,
                $specialPermission
            );

        $permissionsByRole = [
            'admin' => $allPermission,
            'customer' =>  array_merge($orderPermission, $invoicePermission),
        ];


        $insertPermissions = fn ($role) => collect($permissionsByRole[$role])
            ->map(fn ($name) => DB::table('permissions')
                ->insertGetId(
                    ['name' => $name, 'guard_name' => 'web']
                ))->toArray();

        $permissionIdsByRole = [
            'admin' => $insertPermissions('admin'),
            'customer' => $insertPermissions('customer')
        ];

        foreach ($permissionIdsByRole as $role => $permissionIds) {
            $role = Role::whereName($role)->first();

            DB::table('role_has_permissions')
                ->insert(
                    collect($permissionIds)->map(fn ($id) => [
                        'role_id' => $role->id,
                        'permission_id' => $id
                    ])->toArray()
                );
        }

    }
}
