<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpShamsBlogVersionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_shams_blog_versions', function(Blueprint $table)
		{
			$table->bigInteger('blog_id')->default(0);
			$table->string('db_version', 20)->default('');
			$table->dateTime('last_updated')->default('0000-00-00 00:00:00');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_shams_blog_versions');
	}

}
