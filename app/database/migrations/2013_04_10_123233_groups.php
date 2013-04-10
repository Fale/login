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
