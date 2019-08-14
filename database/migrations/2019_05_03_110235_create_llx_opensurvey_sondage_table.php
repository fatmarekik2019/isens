<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxOpensurveySondageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_opensurvey_sondage', function(Blueprint $table)
		{
			$table->string('id_sondage', 16)->primary();
			$table->char('id_sondage_admin', 24)->nullable()->index('idx_id_sondage_admin');
			$table->text('commentaires', 65535)->nullable();
			$table->string('mail_admin', 128)->nullable();
			$table->string('nom_admin', 64)->nullable();
			$table->integer('fk_user_creat')->nullable();
			$table->text('titre', 65535);
			$table->dateTime('date_fin')->index('idx_date_fin');
			$table->string('format', 2);
			$table->boolean('mailsonde')->default(0);
			$table->integer('survey_link_visible')->nullable()->default(1);
			$table->integer('canedit')->nullable()->default(0);
			$table->string('origin', 64)->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->text('sujet', 65535)->nullable();
			$table->integer('entity')->default(1);
			$table->boolean('allow_comments')->default(1);
			$table->boolean('allow_spy')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_opensurvey_sondage');
	}

}
