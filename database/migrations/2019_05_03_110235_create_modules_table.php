<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('modules', function(Blueprint $table)
		{
			$table->integer('id');
			$table->string('name', 32);
			$table->string('table', 32);
			$table->string('slug', 32);
			$table->integer('parent_module_id');
			$table->integer('field_uid');
			$table->integer('field_slug');
			$table->integer('field_parent');
			$table->integer('field_orderby');
			$table->enum('orderby_direction', array('DESC','ASC'))->default('DESC');
			$table->string('management_width', 8);
			$table->string('type');
			$table->boolean('locked');
			$table->boolean('lock_records');
			$table->boolean('core_module');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('modules');
	}

}
