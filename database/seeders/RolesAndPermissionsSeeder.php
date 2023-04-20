<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cached roles and permissions

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

         // create permissions

         Permission::create(['name' => 'view profile']);
         Permission::create(['name' => 'fetch profile info to edit']);
         Permission::create(['name' => 'update profile']);
         Permission::create(['name' => 'delete profile']);

         Permission::create(['name' => 'form to add car']);
         Permission::create(['name' => 'add cars']);
         Permission::create(['name' => 'view cars']);
         Permission::create(['name' => 'form to update car']);
         Permission::create(['name' => 'update or delete cars']);

         Permission::create(['name' => 'view all users']);
         Permission::create(['name' => 'delete users']);

         Permission::create(['name' => 'form to reserve car']);
         Permission::create(['name' => 'view all reservations']);
         Permission::create(['name' => 'create reservations']);
        //  Permission::create(['name' => 'view own reservations']);
         Permission::create(['name' => 'form to update reservation']);
         Permission::create(['name' => 'update or delete reservation']);



          // Define roles available
        $admin = 'admin';
        $user = 'user';


        Role::create(['name' => $admin])->givePermissionTo([
            'view profile',
            'fetch profile info to edit',
            'update profile',
            'form to add car',
            'add cars',
            'view cars',
            'form to update car',
            'update or delete cars',
            'view all users',
            'delete users',
            'view all reservations',
        ]);


        Role::create(['name' => $user])->givePermissionTo([
            'view profile',
            'fetch profile info to edit',
            'update profile',
            'delete profile',
            'view cars',
            'view all reservations',
            'form to reserve car',
            'create reservations',
            'form to update reservation',
            'update or delete reservation',
        ]);


    }
}
