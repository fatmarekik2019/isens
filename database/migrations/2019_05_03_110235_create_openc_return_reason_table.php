<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencReturnReasonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_return_reason', function(Blueprint $table)
		{
			$table->integer('return_reason_id');
			$table->integer('language_id')->default(0);
			$table->string('name', 128)->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_return_reason');
	}

}
