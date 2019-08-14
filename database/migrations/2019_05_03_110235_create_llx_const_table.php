<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxConstTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_const', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('name');
			$table->integer('entity')->default(1);
			$table->text('value', 65535);
			$table->string('type', 6)->nullable();
			$table->boolean('visible')->default(1);
			$table->text('note', 65535)->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->unique(['name','entity'], 'uk_const');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_const');
	}

}
