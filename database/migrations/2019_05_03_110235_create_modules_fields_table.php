<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModulesFieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('modules_fields', function(Blueprint $table)
		{
			$table->integer('id');
			$table->boolean('order');
			$table->integer('module_id');
			$table->string('name', 32);
			$table->string('label', 32);
			$table->string('type', 32);
			$table->boolean('editable');
			$table->string('display_width', 8);
			$table->text('tooltip', 65535);
			$table->string('fieldset');
			$table->boolean('specific_search');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('modules_fields');
	}

}
