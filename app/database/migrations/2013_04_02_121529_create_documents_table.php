<?php

use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('documents', function($t) {
            $t->increments('id');
            $t->integer('user_id');
            $t->integer('type');
            $t->string('number');
            $t->string('provider');
            $t->boolean('verified');
            $t->boolean('visible');
            $t->timestamp('provided');
            $t->timestamp('expiry');
            $t->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('documents');
	}

}
