<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxFichinterdetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_fichinterdet', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_fichinter')->nullable()->index('idx_fichinterdet_fk_fichinter');
			$table->integer('fk_parent_line')->nullable();
			$table->dateTime('date')->nullable();
			$table->text('description', 65535)->nullable();
			$table->integer('duree')->nullable();
			$table->integer('rang')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_fichinterdet');
	}

}
