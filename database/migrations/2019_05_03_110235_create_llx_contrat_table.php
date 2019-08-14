<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxContratTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_contrat', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('ref', 30)->nullable();
			$table->integer('entity')->default(1);
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('datec')->nullable();
			$table->dateTime('date_contrat')->nullable();
			$table->smallInteger('statut')->nullable()->default(0);
			$table->dateTime('mise_en_service')->nullable();
			$table->dateTime('fin_validite')->nullable();
			$table->dateTime('date_cloture')->nullable();
			$table->integer('fk_soc')->index('idx_contrat_fk_soc');
			$table->integer('fk_projet')->nullable();
			$table->integer('fk_commercial_signature');
			$table->integer('fk_commercial_suivi');
			$table->integer('fk_user_author')->default(0)->index('idx_contrat_fk_user_author');
			$table->integer('fk_user_mise_en_service')->nullable();
			$table->integer('fk_user_cloture')->nullable();
			$table->text('note_private', 65535)->nullable();
			$table->text('note_public', 65535)->nullable();
			$table->string('import_key', 14)->nullable();
			$table->string('extraparams')->nullable();
			$table->unique(['ref','entity'], 'uk_contrat_ref');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_contrat');
	}

}
