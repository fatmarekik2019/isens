<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxMailingCiblesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_mailing_cibles', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_mailing');
			$table->integer('fk_contact');
			$table->string('lastname', 50)->nullable();
			$table->string('firstname', 50)->nullable();
			$table->string('email', 160)->index('idx_mailing_cibles_email');
			$table->string('other')->nullable();
			$table->string('tag', 128)->nullable();
			$table->smallInteger('statut')->default(0);
			$table->string('source_url', 160)->nullable();
			$table->integer('source_id')->nullable();
			$table->string('source_type', 16)->nullable();
			$table->dateTime('date_envoi')->nullable();
			$table->unique(['fk_mailing','email'], 'uk_mailing_cibles');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_mailing_cibles');
	}

}
