<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxUserParamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_user_param', function(Blueprint $table)
		{
			$table->integer('fk_user');
			$table->integer('entity')->default(1);
			$table->string('param', 64);
			$table->string('value');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_user_param');
	}

}
