<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCDepartementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_departements', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('code_departement', 6);
			$table->integer('fk_region')->nullable()->index('idx_departements_fk_region');
			$table->string('cheflieu', 50)->nullable();
			$table->integer('tncc')->nullable();
			$table->string('ncc', 50)->nullable();
			$table->string('nom', 50)->nullable();
			$table->boolean('active')->default(1);
			$table->unique(['code_departement','fk_region'], 'uk_departements');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_c_departements');
	}

}
