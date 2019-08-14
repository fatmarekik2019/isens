<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxSocieteLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_societe_log', function(Blueprint $table)
		{
			$table->integer('id');
			$table->dateTime('datel')->nullable();
			$table->integer('fk_soc')->nullable();
			$table->integer('fk_statut')->nullable();
			$table->integer('fk_user')->nullable();
			$table->string('author', 30)->nullable();
			$table->string('label', 128)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_societe_log');
	}

}
