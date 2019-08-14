<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxMailingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_mailing', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->smallInteger('statut')->nullable()->default(0);
			$table->string('titre', 60)->nullable();
			$table->integer('entity')->default(1);
			$table->string('sujet', 60)->nullable();
			$table->text('body', 16777215)->nullable();
			$table->string('bgcolor', 8)->nullable();
			$table->string('bgimage')->nullable();
			$table->string('cible', 60)->nullable();
			$table->integer('nbemail')->nullable();
			$table->string('email_from', 160)->nullable();
			$table->string('email_replyto', 160)->nullable();
			$table->string('email_errorsto', 160)->nullable();
			$table->string('tag', 128)->nullable();
			$table->dateTime('date_creat')->nullable();
			$table->dateTime('date_valid')->nullable();
			$table->dateTime('date_appro')->nullable();
			$table->dateTime('date_envoi')->nullable();
			$table->integer('fk_user_creat')->nullable();
			$table->integer('fk_user_valid')->nullable();
			$table->integer('fk_user_appro')->nullable();
			$table->string('extraparams')->nullable();
			$table->string('joined_file1')->nullable();
			$table->string('joined_file2')->nullable();
			$table->string('joined_file3')->nullable();
			$table->string('joined_file4')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_mailing');
	}

}
