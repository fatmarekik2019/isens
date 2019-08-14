<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCTypeContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_type_contact', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('element', 30);
			$table->string('source', 8)->default('external');
			$table->string('code', 32);
			$table->string('libelle', 64);
			$table->boolean('active')->default(1);
			$table->string('module', 32)->nullable();
			$table->unique(['element','source','code'], 'uk_c_type_contact_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_c_type_contact');
	}

}
