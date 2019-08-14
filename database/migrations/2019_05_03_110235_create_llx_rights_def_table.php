<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxRightsDefTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_rights_def', function(Blueprint $table)
		{
			$table->integer('id')->default(0);
			$table->string('libelle')->nullable();
			$table->string('module', 64)->nullable();
			$table->integer('entity')->default(1);
			$table->string('perms', 50)->nullable();
			$table->string('subperms', 50)->nullable();
			$table->string('type', 1)->nullable();
			$table->boolean('bydefault')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_rights_def');
	}

}
