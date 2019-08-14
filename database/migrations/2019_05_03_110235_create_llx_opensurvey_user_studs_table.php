<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxOpensurveyUserStudsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_opensurvey_user_studs', function(Blueprint $table)
		{
			$table->integer('id_users')->index('idx_opensurvey_user_studs_id_users');
			$table->string('nom', 64)->index('idx_opensurvey_user_studs_nom');
			$table->string('id_sondage', 16)->index('idx_opensurvey_user_studs_id_sondage');
			$table->string('reponses', 100);
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_opensurvey_user_studs');
	}

}
