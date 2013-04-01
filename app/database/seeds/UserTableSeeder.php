<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'email' => 'fabiolocati@gmail.com',
            'password' => Hash::make('test'),
        ));
    }

}
