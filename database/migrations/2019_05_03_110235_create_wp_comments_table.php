<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_comments', function(Blueprint $table)
		{
			$table->bigInteger('comment_ID')->unsigned();
			$table->bigInteger('comment_post_ID')->unsigned()->default(0);
			$table->text('comment_author');
			$table->string('comment_author_email', 100)->default('');
			$table->string('comment_author_url', 200)->default('');
			$table->string('comment_author_IP', 100)->default('');
			$table->dateTime('comment_date')->default('0000-00-00 00:00:00');
			$table->dateTime('comment_date_gmt')->default('0000-00-00 00:00:00');
			$table->text('comment_content', 65535);
			$table->integer('comment_karma')->default(0);
			$table->string('comment_approved', 20)->default('1');
			$table->string('comment_agent')->default('');
			$table->string('comment_type', 20)->default('');
			$table->bigInteger('comment_parent')->unsigned()->default(0);
			$table->bigInteger('user_id')->unsigned()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_comments');
	}

}
