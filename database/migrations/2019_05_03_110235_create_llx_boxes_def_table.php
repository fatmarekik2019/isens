<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxBoxesDefTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_boxes_def', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('file', 200);
			$table->integer('entity')->default(1);
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('note', 130)->nullable();
			$table->unique(['file','entity','note'], 'uk_boxes_def');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_boxes_def');
	}

}
