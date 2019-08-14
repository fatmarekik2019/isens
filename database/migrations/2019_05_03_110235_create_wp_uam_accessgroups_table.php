<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpUamAccessgroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_uam_accessgroups', function(Blueprint $table)
		{
			$table->integer('ID');
			$table->text('groupname');
			$table->text('groupdesc', 65535);
			$table->text('read_access');
			$table->text('write_access');
			$table->text('ip_range', 16777215)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_uam_accessgroups');
	}

}
