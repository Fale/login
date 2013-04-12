<?php

use Illuminate\Database\Migrations\Migration;

class Documentsdate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('documents', function($table)
        {
            $table->dropColumn('provided');
            $table->dropColumn('expiry');
        });

        Schema::table('documents', function($table)
        {
            $table->date('provided')->after('provider');
            $table->date('expiry')->after('provided');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('documents', function($table)
        {
            $table->dropColumn('provided');
            $table->dropColumn('expiry');
        });

        Schema::table('documents', function($table)
        {
            $table->datetime('provided')->after('provider');
            $table->datetime('expiry')->after('provided');
        });
	}

}
