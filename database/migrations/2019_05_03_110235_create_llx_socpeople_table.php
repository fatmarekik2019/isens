<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxSocpeopleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_socpeople', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->dateTime('datec')->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('fk_soc')->nullable();
			$table->integer('entity')->default(1);
			$table->string('ref_ext', 128)->nullable();
			$table->string('civilite', 6)->nullable();
			$table->string('lastname', 50)->nullable();
			$table->string('firstname', 50)->nullable();
			$table->string('address')->nullable();
			$table->string('zip', 10)->nullable();
			$table->text('town', 65535)->nullable();
			$table->integer('fk_departement')->nullable();
			$table->integer('fk_pays')->nullable()->default(0);
			$table->date('birthday')->nullable();
			$table->string('poste', 80)->nullable();
			$table->string('phone', 30)->nullable();
			$table->string('phone_perso', 30)->nullable();
			$table->string('phone_mobile', 30)->nullable();
			$table->string('fax', 30)->nullable();
			$table->string('email')->nullable();
			$table->string('jabberid')->nullable();
			$table->string('skype')->nullable();
			$table->smallInteger('no_email')->default(0);
			$table->smallInteger('priv')->default(0);
			$table->integer('fk_user_creat')->nullable()->default(0);
			$table->integer('fk_user_modif')->nullable();
			$table->text('note_private', 65535)->nullable();
			$table->text('note_public', 65535)->nullable();
			$table->string('default_lang', 6)->nullable();
			$table->string('canvas', 32)->nullable();
			$table->string('import_key', 14)->nullable();
			$table->boolean('statut')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_socpeople');
	}

}
