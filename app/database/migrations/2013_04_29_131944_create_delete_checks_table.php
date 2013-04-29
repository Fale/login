<?php

use Illuminate\Database\Migrations\Migration;

class CreateDeleteChecksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('delete_checks', function($t)
        {
            $t->integer('user_id')->primary();
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
        Schema::drop('delete_checks');
	}

}
