<?php

use App\Profile;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
class AdminUser2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
        	'name'=>'customer',
        	'description'=>'customer Role'
        ]);
        $role = Role::create([
        	'name'=>'admin',
        	'description'=>'User Role'

        ]);

        $user = User::create([

        	'email'=>'admin@admin.com',
        	'password'=>bcrypt('secret'),
        	'role_id'=> $role->id
        ]);

        $profile = Profile::create([
        	'user_id'=>$user->id
        ]);

    }
}

/*
	****************************************************************************
	|					Documentation
	****************************************************************************
	|1) Seeding:
	****************************************************************************
	|		Seeding will create a user with name and role with admin in the table
	|	when we will migrate the tables just we to run the query in cmd
	|	Query:
	|			php artisan migrate --seed
	|	
	|
	|
	|
	|
	|
	|
	|
	|
	|
	****************************************************************************
*/