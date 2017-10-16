<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_instructor = Role::where('name', 'instructor')->first();
        $role_trainer = Role::where('name', 'trainer')->first();

        $admin = new User();
        $admin->name = 'admin name';
        $admin->email = 'admin@venus.com';
        $admin->password = bcrypt('password');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $instructor = new User();
        $instructor->name = 'instructor name';
        $instructor->email = 'instructor@venus.com';
        $instructor->password = bcrypt('password');
        $instructor->save();
        $instructor->roles()->attach($role_instructor);

        $trainer = new User();
        $trainer->name = 'trainer name';
        $trainer->email = 'trainer@venus.com';
        $trainer->password = bcrypt('password');
        $trainer->save();
        $trainer->roles()->attach($role_trainer);

    }
}
