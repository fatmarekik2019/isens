<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxDocumentModelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_document_model', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('nom', 50)->nullable();
			$table->integer('entity')->default(1);
			$table->string('type', 20);
			$table->string('libelle')->nullable();
			$table->text('description', 65535)->nullable();
			$table->unique(['nom','type','entity'], 'uk_document_model');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_document_model');
	}

}
