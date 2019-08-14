<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_posts', function(Blueprint $table)
		{
			$table->bigInteger('ID')->unsigned();
			$table->bigInteger('post_author')->unsigned()->default(0);
			$table->dateTime('post_date')->default('0000-00-00 00:00:00');
			$table->dateTime('post_date_gmt')->default('0000-00-00 00:00:00');
			$table->text('post_content');
			$table->text('post_title', 65535);
			$table->text('post_excerpt', 65535);
			$table->string('post_status', 20)->default('publish');
			$table->string('comment_status', 20)->default('open');
			$table->string('ping_status', 20)->default('open');
			$table->string('post_password', 20)->default('');
			$table->string('post_name', 200)->default('');
			$table->text('to_ping', 65535);
			$table->text('pinged', 65535);
			$table->dateTime('post_modified')->default('0000-00-00 00:00:00');
			$table->dateTime('post_modified_gmt')->default('0000-00-00 00:00:00');
			$table->text('post_content_filtered', 65535);
			$table->bigInteger('post_parent')->unsigned()->default(0);
			$table->string('guid')->default('');
			$table->integer('menu_order')->default(0);
			$table->string('post_type', 20)->default('post');
			$table->string('post_mime_type', 100)->default('');
			$table->bigInteger('comment_count')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_posts');
	}

}
