<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpUamAccessgroupToObjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_uam_accessgroup_to_object', function(Blueprint $table)
		{
			$table->string('object_id', 11);
			$table->string('object_type');
			$table->integer('group_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_uam_accessgroup_to_object');
	}

}
