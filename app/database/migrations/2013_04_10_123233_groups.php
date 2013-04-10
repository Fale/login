<?php

use Illuminate\Database\Migrations\Migration;

class Groups extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_infos', function($table)
        {
            $table->integer('group')->after('comitato');
        });

        Schema::table('groups', function($table)
        {
            $table->string('province', 2)->after('zip_code');
        });

        $conversion = array(
            "no" => '0',
            "adda" => '1',
            "ariosto" => '2',
            "arnaldo" => '3',
            "bassa" => '4',
            "cantu" => '5',
            "castagnato" => '6',
            "chiari" => '7',
            "degiorgimi" => '8',
            "degiornina" => '9',
            "coraggio" => '10',
            "corte" => '11',
            "francia" => '12',
            "gussago" => '13',
            "invictus" => '14',
            "cave" => '15',
            "lecco" => '16',
            "liberal" => '17',
            "martesana" => '18',
            "merate" => '19',
            "milano00" => '20',
            "milanocentro" => '21',
            "milanone" => '22',
            "mn" => '23',
            "monza" => '24',
            "nova" => '25',
            "romana" => '26',
            "tito" => '27',
            "valvassina" => '28',
            "viadana" => '29',
            "zanardelli" => '30',
        );
        foreach(UserInfo::get() as $user)
        {
            if (!$user->group) {
                $new = $conversion[$user->comitato];
                $user->update(array('group' => $new));
            }
        }

        Schema::table('user_infos', function($table)
        {
            $table->dropColumn('comitato');
        });

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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }

}
