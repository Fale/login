<?php

class GroupTableSeeder extends Seeder {

    public function run()
    {
        DB::table('groups')->delete();
        Group::create(array(
            'name' => 'Adda',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Ariosto',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Arnaldo da Brescia',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Bassa Bresciana',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Cantù',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Castagnato',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Chiari',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Civico deGiorgi MI',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Civico deGiorgi NA',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Coraggio',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Cortefranca-Adro',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Franciacorta',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Gussago',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Invictus',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Le Cave',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Lecco',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Liberal',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Martesana',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Merate',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Milano 00',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Milano Centro',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Milano Nord-Est',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'MN Viadana',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Monza e Brianza',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Nova Mse',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Pta Romana',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Tito Speri',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Valvassina',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Viadana',
            'zip_code' => '',
            'province' => '',
        ));
        Group::create(array(
            'name' => 'Zanardelli',
            'zip_code' => '',
            'province' => '',
        ));
    }

}
