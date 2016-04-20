<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $user = new User();
        $user->email = 'cameron@codeup.com';
        $user->password = $_ENV['USER_PASS'];
        $user->username = 'cameronholland90';
        $user->first_name = 'Cameron';
        $user->last_name = 'Holland';
        $user->role = 'Admin';
        $user->save();
    }

}