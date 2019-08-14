<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxAdherentTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_adherent_type', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('entity')->default(1);
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->smallInteger('statut')->default(0);
			$table->string('libelle', 50);
			$table->string('cotisation', 3)->default('yes');
			$table->string('vote', 3)->default('yes');
			$table->text('note', 65535)->nullable();
			$table->text('mail_valid', 65535)->nullable();
			$table->unique(['libelle','entity'], 'uk_adherent_type_libelle');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_adherent_type');
	}

}
