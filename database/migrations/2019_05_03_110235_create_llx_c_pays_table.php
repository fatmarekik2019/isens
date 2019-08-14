<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCPaysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_pays', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('code', 2)->unique('idx_c_pays_code');
			$table->string('code_iso', 3)->nullable()->unique('idx_c_pays_code_iso');
			$table->string('libelle', 50)->unique('idx_c_pays_libelle');
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
		Schema::drop('llx_c_pays');
	}

}
