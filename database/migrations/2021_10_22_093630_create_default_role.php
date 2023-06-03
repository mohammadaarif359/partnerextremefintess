<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;
use App\Models\User;

class CreateDefaultRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create deafult role
		$defaultrole = array('superadmin','gym-partner');
	    foreach($defaultrole as $roleData) {
			if(!Role::where('name',$roleData)->exists()) {
				$role = new Role();
				$role->name = $roleData;
				$role->display_name = ucwords(str_replace("-"," ",$roleData));
				$role->save();
			}
		}
		// create superadmin user
		$user = User::create([
			'name'=>'superadmin',
			'email'=>'aarif@technoscore.net',
			'mobile'=>8290027571,
			'password'=>bcrypt('123456'),
			'status'=>1
		]);
		// attach role
		$role = Role::where('name','superadmin')->first();
		$user->attachRole($role->id);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
    }
}
