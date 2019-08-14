<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCotisationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_cotisation', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('datec')->nullable();
			$table->integer('fk_adherent')->nullable();
			$table->dateTime('dateadh')->nullable();
			$table->date('datef')->nullable();
			$table->float('cotisation', 10, 0)->nullable();
			$table->integer('fk_bank')->nullable();
			$table->text('note', 65535)->nullable();
			$table->unique(['fk_adherent','dateadh'], 'uk_cotisation');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_cotisation');
	}

}
