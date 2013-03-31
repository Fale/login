<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('users', function($t) {
            $t->increments('id');
            $t->string('email', 45)->unique();
            $t->string('password', 64);
            $t->timestamp('registered');
            $t->timestamp('modified');
            $t->boolean('checked');
            $t->boolean('verified');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('users');
	}

}
