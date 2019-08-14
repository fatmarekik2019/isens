<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxComptaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_compta', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->dateTime('datec')->nullable();
			$table->date('datev')->nullable();
			$table->float('amount', 10, 0)->default(0);
			$table->string('label')->nullable();
			$table->integer('fk_compta_account')->nullable();
			$table->integer('fk_user_author')->nullable();
			$table->integer('fk_user_valid')->nullable();
			$table->boolean('valid')->nullable()->default(0);
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
		Schema::drop('llx_compta');
	}

}
