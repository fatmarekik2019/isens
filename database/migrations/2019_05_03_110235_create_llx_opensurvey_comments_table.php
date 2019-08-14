<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxOpensurveyCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_opensurvey_comments', function(Blueprint $table)
		{
			$table->integer('id_comment')->unsigned()->index('idx_id_comment');
			$table->char('id_sondage', 16)->index('idx_id_sondage');
			$table->text('comment', 65535);
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->text('usercomment', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_opensurvey_comments');
	}

}
