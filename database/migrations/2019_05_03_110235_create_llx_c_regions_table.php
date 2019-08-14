<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCRegionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_regions', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('code_region')->unique('code_region');
			$table->integer('fk_pays')->index('idx_c_regions_fk_pays');
			$table->string('cheflieu', 50)->nullable();
			$table->integer('tncc')->nullable();
			$table->string('nom', 50)->nullable();
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
		Schema::drop('llx_c_regions');
	}

}
