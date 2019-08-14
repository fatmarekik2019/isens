<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxFactureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_facture', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('facnumber', 30);
			$table->integer('entity')->default(1);
			$table->string('ref_ext')->nullable();
			$table->string('ref_int')->nullable();
			$table->string('ref_client')->nullable();
			$table->smallInteger('type')->default(0);
			$table->string('increment', 10)->nullable();
			$table->integer('fk_soc')->index('idx_facture_fk_soc');
			$table->dateTime('datec')->nullable();
			$table->date('datef')->nullable();
			$table->date('date_valid')->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->smallInteger('paye')->default(0);
			$table->float('amount', 24, 8)->default(0.00000000);
			$table->float('remise_percent', 10, 0)->nullable()->default(0);
			$table->float('remise_absolue', 10, 0)->nullable()->default(0);
			$table->float('remise', 10, 0)->nullable()->default(0);
			$table->string('close_code', 16)->nullable();
			$table->string('close_note', 128)->nullable();
			$table->float('tva', 24, 8)->nullable()->default(0.00000000);
			$table->float('localtax1', 24, 8)->nullable()->default(0.00000000);
			$table->float('localtax2', 24, 8)->nullable()->default(0.00000000);
			$table->float('revenuestamp', 24, 8)->nullable()->default(0.00000000);
			$table->float('total', 24, 8)->nullable()->default(0.00000000);
			$table->float('total_ttc', 24, 8)->nullable()->default(0.00000000);
			$table->smallInteger('fk_statut')->default(0);
			$table->integer('fk_user_author')->nullable()->index('idx_facture_fk_user_author');
			$table->integer('fk_user_valid')->nullable()->index('idx_facture_fk_user_valid');
			$table->integer('fk_facture_source')->nullable()->index('idx_facture_fk_facture_source');
			$table->integer('fk_projet')->nullable()->index('idx_facture_fk_projet');
			$table->integer('fk_account')->nullable()->index('idx_facture_fk_account');
			$table->string('fk_currency', 3)->nullable()->index('idx_facture_fk_currency');
			$table->integer('fk_cond_reglement')->default(1);
			$table->integer('fk_mode_reglement')->nullable();
			$table->date('date_lim_reglement')->nullable();
			$table->text('note_private', 65535)->nullable();
			$table->text('note_public', 65535)->nullable();
			$table->string('model_pdf')->nullable();
			$table->string('import_key', 14)->nullable();
			$table->string('extraparams')->nullable();
			$table->unique(['facnumber','entity'], 'idx_facture_uk_facnumber');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_facture');
	}

}
