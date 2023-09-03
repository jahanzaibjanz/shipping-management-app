<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'agent-list',
            'agent-create',
            'agent-edit',
            'agent-delete',
            'client-list',
            'client-create',
            'client-edit',
            'client-delete',
            'shipper-list',
            'shipper-create',
            'shipper-edit',
            'shipper-delete',
            'shippingline-list',
            'shippingline-create',
            'shippingline-edit',
            'shippingline-delete',
            'shipment-list',
            'shipment-create',
            'shipment-edit',
            'shipment-delete',
         ];
      
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
        //
    }
}
