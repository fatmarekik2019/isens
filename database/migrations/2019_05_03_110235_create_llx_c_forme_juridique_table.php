<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCFormeJuridiqueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_forme_juridique', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('code')->unique('uk_c_forme_juridique');
			$table->integer('fk_pays');
			$table->string('libelle')->nullable();
			$table->boolean('isvatexempted')->default(0);
			$table->boolean('active')->default(1);
			$table->string('module', 32)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_c_forme_juridique');
	}

}
