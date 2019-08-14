<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxUserClicktodialTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_user_clicktodial', function(Blueprint $table)
		{
			$table->integer('fk_user');
			$table->string('url')->nullable();
			$table->string('login', 32)->nullable();
			$table->string('pass', 64)->nullable();
			$table->string('poste', 20)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_user_clicktodial');
	}

}
