<?php

use Illuminate\Database\Migrations\Migration;

class CreateEmailChecksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('email_checks', function($t)
		{
			$t->string('email');
			$t->string('token');
			$t->timestamp('created_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('email_checks');
	}

}
