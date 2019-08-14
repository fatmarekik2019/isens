<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxAdherentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_adherent', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('entity')->default(1);
			$table->string('ref_ext', 128)->nullable();
			$table->string('civilite', 6)->nullable();
			$table->string('lastname', 50)->nullable();
			$table->string('firstname', 50)->nullable();
			$table->string('login', 50)->nullable();
			$table->string('pass', 50)->nullable();
			$table->integer('fk_adherent_type')->index('idx_adherent_fk_adherent_type');
			$table->string('morphy', 3);
			$table->string('societe', 50)->nullable();
			$table->integer('fk_soc')->nullable()->unique('uk_adherent_fk_soc');
			$table->text('address', 65535)->nullable();
			$table->string('zip', 10)->nullable();
			$table->string('town', 50)->nullable();
			$table->string('state_id', 50)->nullable();
			$table->string('country', 50)->nullable();
			$table->string('email')->nullable();
			$table->string('skype')->nullable();
			$table->string('phone', 30)->nullable();
			$table->string('phone_perso', 30)->nullable();
			$table->string('phone_mobile', 30)->nullable();
			$table->date('birth')->nullable();
			$table->string('photo')->nullable();
			$table->smallInteger('statut')->default(0);
			$table->smallInteger('public')->default(0);
			$table->dateTime('datefin')->nullable();
			$table->text('note', 65535)->nullable();
			$table->dateTime('datevalid')->nullable();
			$table->dateTime('datec')->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('fk_user_author')->nullable();
			$table->integer('fk_user_mod')->nullable();
			$table->integer('fk_user_valid')->nullable();
			$table->string('canvas', 32)->nullable();
			$table->string('import_key', 14)->nullable();
			$table->unique(['login','entity'], 'uk_adherent_login');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_adherent');
	}

}
