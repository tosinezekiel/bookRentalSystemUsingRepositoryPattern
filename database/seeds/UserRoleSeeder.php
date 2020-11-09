<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);
        $users = User::find([2,3,4,5,6]);
       
        $role = Role::whereName("admin")->first();
        $userrole = Role::whereName("user")->first();
        $user->roles()->attach($role->id);
        foreach($users as $user){
            $user->roles()->attach($userrole->id);
        }
    }
}
