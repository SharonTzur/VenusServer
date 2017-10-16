<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
        $role_employee->name = 'admin';
        $role_employee->description = 'can create users and resources';
        $role_employee->save();
        $role_manager = new Role();
        $role_manager->name = 'instructor';
        $role_manager->description = 'can watch other users learning';
        $role_manager->save();
        $role_manager = new Role();
        $role_manager->name = 'trainer';
        $role_manager->description = 'can watch his own resources and accomplish them';
        $role_manager->save();
    }
}
