<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $admin = User::where('name', '=', 'Ivan')->first();
    	if(!$admin)
	    {
		    $admin = new User();
		    $admin->name = 'Ivan';
		    $admin->email = 'Ivan@bk.ru';
		    $admin->password = bcrypt('123456');

		    $admin->save();
	    }
    }
}
