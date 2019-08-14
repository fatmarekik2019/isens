<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencStoreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_store', function(Blueprint $table)
		{
			$table->integer('store_id');
			$table->string('name', 64);
			$table->string('url');
			$table->string('ssl');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_store');
	}

}
