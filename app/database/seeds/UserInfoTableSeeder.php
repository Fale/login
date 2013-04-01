<?php

class UserInfoTableSeeder extends Seeder {

    public function run()
    {
        DB::table('userinfos')->delete();
        UserInfo::create(array(
            'user_id' => 1,
            'name' => 'Fabio Alessandro',
            'surname' => 'Locati',
            'sex' => '0',
            'birth' => '1990-04-11',
            'address' => 'Via NOME',
            'number' => '00',
            'city' => 'COMUNE',
            'province' => 'MI',
            'zipcode' => 'CAP',
            'country' => 'Italy',
            'phone' => '+39 0000000000'
        ));
    }

}
