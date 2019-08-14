<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpShamsUsermetaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_shams_usermeta', function(Blueprint $table)
		{
			$table->bigInteger('umeta_id')->unsigned();
			$table->bigInteger('user_id')->unsigned()->default(0);
			$table->string('meta_key')->nullable();
			$table->text('meta_value')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_shams_usermeta');
	}

}
