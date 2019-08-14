<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCTypeResourceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_type_resource', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('code', 32);
			$table->string('label', 64);
			$table->boolean('active')->default(1);
			$table->unique(['label','code'], 'uk_c_type_resource_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_c_type_resource');
	}

}
