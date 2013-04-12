<?php

use Illuminate\Database\Migrations\Migration;

class CreateDocumentTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('document_types', function($table)
        {
            $table->increments('id');
            $table->string('name');
            $table->boolean('unique');
            $table->boolean('back');
            $table->boolean('pages');
        });

        DocumentType::create(array(
            'name' => 'Carta di Identità',
            'unique' => '1',
            'back' => '1',
            'pages' => '0'
        ));

        DocumentType::create(array(
            'name' => 'Passaporto',
            'unique' => '1',
            'back' => '1',
            'pages' => '1'
        ));

        DocumentType::create(array(
            'name' => 'Patente di guida',
            'unique' => '1',
            'back' => '1',
            'pages' => '0'
        ));

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('document_types');
	}

}
