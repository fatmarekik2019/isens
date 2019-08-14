<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxComptaAccountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_compta_account', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->dateTime('datec')->nullable();
			$table->string('number', 12)->nullable();
			$table->string('label')->nullable();
			$table->integer('fk_user_author')->nullable();
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
		Schema::drop('llx_compta_account');
	}

}
