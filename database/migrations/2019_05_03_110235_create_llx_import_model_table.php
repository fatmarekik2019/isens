<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxImportModelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_import_model', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_user')->default(0);
			$table->string('label', 50);
			$table->string('type', 20);
			$table->text('field', 65535);
			$table->unique(['label','type'], 'uk_import_model');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_import_model');
	}

}
