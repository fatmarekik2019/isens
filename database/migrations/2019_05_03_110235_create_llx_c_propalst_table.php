<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCPropalstTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_propalst', function(Blueprint $table)
		{
			$table->smallInteger('id')->primary();
			$table->string('code', 12)->unique('uk_c_propalst');
			$table->string('label', 30)->nullable();
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
		Schema::drop('llx_c_propalst');
	}

}
