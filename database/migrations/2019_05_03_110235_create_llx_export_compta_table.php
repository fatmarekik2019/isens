<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxExportComptaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_export_compta', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('ref', 12);
			$table->dateTime('date_export');
			$table->integer('fk_user');
			$table->text('note', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_export_compta');
	}

}
