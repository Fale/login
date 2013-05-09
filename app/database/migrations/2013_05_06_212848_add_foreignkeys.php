<?php

use Illuminate\Database\Migrations\Migration;

class AddForeignkeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        // Create new columns
        Schema::table('user_infos', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('user_id_new')->after('user_id')->unsigned();
        });
        Schema::table('documents', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('user_id_new')->after('user_id')->unsigned();
            $table->integer('type_id')->after('type')->unsigned();
        });
        Schema::table('email_checks', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('user_id_new')->after('user_id')->unsigned();
        });
        Schema::table('delete_checks', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('user_id_new')->after('user_id')->unsigned();
        });
        Schema::table('roles', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('group_id_new')->after('group_id')->unsigned();
            $table->integer('user_id_new')->after('user_id')->unsigned();
        });

        // Move data from old columns to new columns
        foreach (UserInfo::all() as $data)
            $data->update(array('user_id_new' => $data->user_id));
        foreach (Document::all() as $data)
            $data->update(array('user_id_new' => $data->user_id));
        foreach (Document::all() as $data)
            $data->update(array('type_id' => $data->type));
        foreach (EmailCheck::all() as $data)
            $data->update(array('user_id_new' => $data->user_id));
        foreach (DeleteCheck::all() as $data)
            $data->update(array('user_id_new' => $data->user_id));

        // Removing old columns
        Schema::table('user_infos', function($table)
        {
            $table->dropColumn('user_id');
            $table->renameColumn('user_id_new', 'user_id');
		    $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('documents', function($table)
        {
            $table->dropColumn('user_id');
            $table->renameColumn('user_id_new', 'user_id');
		    $table->foreign('user_id')->references('id')->on('users');
            $table->dropColumn('type');
		    $table->foreign('type_id')->references('id')->on('document_types');
        });
        Schema::table('email_checks', function($table)
        {
            $table->dropColumn('user_id');
            $table->renameColumn('user_id_new', 'user_id');
		    $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('delete_checks', function($table)
        {
            $table->dropColumn('user_id');
            $table->renameColumn('user_id_new', 'user_id');
		    //$table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('roles', function($table)
        {
            $table->dropColumn('user_id');
            $table->renameColumn('user_id_new', 'user_id');
		    $table->foreign('user_id')->references('id')->on('users');
            $table->dropColumn('group_id');
            $table->renameColumn('group_id_new', 'group_id');
		    $table->foreign('group_id')->references('id')->on('groups');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('user_infos', function($table)
        {
            $table->drop_foreign('user_id');
        });
        Schema::table('documents', function($table)
        {
            $table->drop_foreign('user_id');
            $table->renameColumn('type_id', 'type');
            $table->drop_foreign('user_id');
        });
        Schema::table('email_checks', function($table)
        {
            $table->drop_foreign('user_id');
        });
        Schema::table('delete_checks', function($table)
        {
            $table->drop_foreign('user_id');
        });
        Schema::table('roles', function($table)
        {
            $table->drop_foreign('user_id');
            $table->drop_foreign('group_id');
        });
	}

}
