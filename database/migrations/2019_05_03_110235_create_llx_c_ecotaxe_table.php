<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCEcotaxeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_ecotaxe', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('code', 64)->unique('uk_c_ecotaxe');
			$table->string('libelle')->nullable();
			$table->float('price', 24, 8)->nullable();
			$table->string('organization')->nullable();
			$table->integer('fk_pays');
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
		Schema::drop('llx_c_ecotaxe');
	}

}
