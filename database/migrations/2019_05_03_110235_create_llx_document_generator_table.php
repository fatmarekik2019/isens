<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxDocumentGeneratorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_document_generator', function(Blueprint $table)
		{
			$table->integer('rowid')->unsigned()->primary();
			$table->string('name');
			$table->string('classfile');
			$table->string('class');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_document_generator');
	}

}
