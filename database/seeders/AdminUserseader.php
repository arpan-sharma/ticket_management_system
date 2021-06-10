<?php

namespace Database\Seeders;

use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Illuminate\Database\Seeder;
use Sentinel;

class AdminUserseader extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		// \App\Models\User::factory(10)->create();

		$credentials = [
			'email' => "admin@ticketneosoft.com",
			'username' => "admin@neosoft",
			'first_name' => "Admin",
			'user_type' => "Admin",
			'password' => 123,
		];
		$user = Sentinel::register($credentials);
		$new_user_id = $user->id;
		//=========== Find & Attach User Role ==============//
		$role = Sentinel::findRoleByName('Admin');
		$role->users()->attach($user);
		$activation = Activation::create($user);
		$active_user = Sentinel::findById($new_user_id);
	}
}
