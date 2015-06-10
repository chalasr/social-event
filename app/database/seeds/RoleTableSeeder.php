<?php

class RoleTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
			$fixtures = [
					['name' => 'candidat'],
					['name' => 'jury'],
					['name' => 'admin'],
			];

			foreach($fixtures as $role){
    			Role::create($role);
			}
	}

}
