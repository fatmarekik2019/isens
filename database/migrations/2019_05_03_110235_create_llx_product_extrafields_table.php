<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxProductExtrafieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_product_extrafields', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('fk_object');
			$table->string('import_key', 14)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_product_extrafields');
	}

}
