<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpShamsBlogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_shams_blogs', function(Blueprint $table)
		{
			$table->bigInteger('blog_id');
			$table->bigInteger('site_id')->default(0);
			$table->string('domain', 200)->default('');
			$table->string('path', 100)->default('');
			$table->dateTime('registered')->default('0000-00-00 00:00:00');
			$table->dateTime('last_updated')->default('0000-00-00 00:00:00');
			$table->boolean('public')->default(1);
			$table->boolean('archived')->default(0);
			$table->boolean('mature')->default(0);
			$table->boolean('spam')->default(0);
			$table->boolean('deleted')->default(0);
			$table->integer('lang_id')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_shams_blogs');
	}

}
