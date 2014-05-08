<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $user = new User();
        $user->email = 'cameron@codeup.com';
        $user->password = 'adminPass123!';
        $user->username = 'cameronholland90';
        $user->first_name = 'Cameron';
        $user->last_name = 'Holland';
        $user->role = 'Admin';
        $user->save();
    }

}