<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencSettingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_setting', function(Blueprint $table)
		{
			$table->integer('setting_id');
			$table->integer('store_id')->default(0);
			$table->string('group', 32);
			$table->string('key', 64)->default('');
			$table->text('value', 65535);
			$table->boolean('serialized');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_setting');
	}

}
