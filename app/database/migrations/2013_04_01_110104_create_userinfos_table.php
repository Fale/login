<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserInfosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('userinfos', function($t) {
            $t->integer('user_id');
            $t->string('name', 64);
            $t->string('surname', 64);
            $t->boolean('sex');
            $t->date('birth');
            $t->string('address', 30);
            $t->string('address 2', 30);
            $t->string('city', 30);
            $t->string('province', 2);
            $t->string('zipcode', 10);
            $t->string('country', 30);
            $t->string('phone', 16);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('userinfos');
	}

}
