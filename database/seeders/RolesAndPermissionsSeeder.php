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
         Permission::create(['name' => 'update profile']);
         Permission::create(['name' => 'delete profile']);

         Permission::create(['name' => 'add cars']);
         Permission::create(['name' => 'view cars']);
         Permission::create(['name' => 'update cars']);
         Permission::create(['name' => 'delete cars']);

         Permission::create(['name' => 'view all users']);
         Permission::create(['name' => 'delete users']);

         Permission::create(['name' => 'view all reservations']);
         Permission::create(['name' => 'create reservations']);
        //  Permission::create(['name' => 'view own reservations']);
         Permission::create(['name' => 'update reservations']);
         Permission::create(['name' => 'delete reservations']);



          // Define roles available
        $admin = 'admin';
        $user = 'user';


        Role::create(['name' => $admin])->givePermissionTo([
            'view profile',
            'update profile',
            'add cars',
            'view cars',
            'update cars',
            'delete cars',
            'view all users',
            'delete users',
            'view all reservations',
        ]);


        Role::create(['name' => $user])->givePermissionTo([
            'view profile',
            'update profile',
            'delete profile',
            'view cars',
            'view all reservations',
            'create reservations',
            'update reservations',
            'delete reservations',
        ]);


    }
}
