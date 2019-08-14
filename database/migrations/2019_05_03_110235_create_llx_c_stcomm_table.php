<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCStcommTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_stcomm', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('code', 12)->unique('uk_c_stcomm');
			$table->string('libelle', 30)->nullable();
			$table->boolean('active')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_c_stcomm');
	}

}
