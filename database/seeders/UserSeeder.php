<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$data = [
			['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => 'password', 'role' => 'admin'],
			['name' => 'Agent', 'email' => 'agent@gmail.com', 'password' => 'password', 'role' => 'agent'],
			['name' => 'Customer', 'email' => 'customer@gmail.com', 'password' => 'password', 'role' => 'customer']
		];
		$hash = function ($value) {
			return array_merge($value, ['password' => Hash::make($value['password'])]);
		};
		$withPassword = array_map($hash, $data);
		DB::table('users')->insert($withPassword);
	}
}
