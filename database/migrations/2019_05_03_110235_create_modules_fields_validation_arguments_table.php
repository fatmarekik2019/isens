<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModulesFieldsValidationArgumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('modules_fields_validation_arguments', function(Blueprint $table)
		{
			$table->integer('id');
			$table->integer('validation_id');
			$table->integer('index');
			$table->string('value', 32);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('modules_fields_validation_arguments');
	}

}
