<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxFactureFournTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_facture_fourn', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('ref', 30)->nullable();
			$table->string('ref_supplier', 50)->nullable();
			$table->integer('entity')->default(1);
			$table->string('ref_ext', 30)->nullable();
			$table->smallInteger('type')->default(0);
			$table->integer('fk_soc')->index('idx_facture_fourn_fk_soc');
			$table->dateTime('datec')->nullable();
			$table->date('datef')->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('libelle')->nullable();
			$table->smallInteger('paye')->default(0);
			$table->float('amount', 24, 8)->default(0.00000000);
			$table->float('remise', 24, 8)->nullable()->default(0.00000000);
			$table->string('close_code', 16)->nullable();
			$table->string('close_note', 128)->nullable();
			$table->float('tva', 24, 8)->nullable()->default(0.00000000);
			$table->float('localtax1', 24, 8)->nullable()->default(0.00000000);
			$table->float('localtax2', 24, 8)->nullable()->default(0.00000000);
			$table->float('total', 24, 8)->nullable()->default(0.00000000);
			$table->float('total_ht', 24, 8)->nullable()->default(0.00000000);
			$table->float('total_tva', 24, 8)->nullable()->default(0.00000000);
			$table->float('total_ttc', 24, 8)->nullable()->default(0.00000000);
			$table->smallInteger('fk_statut')->default(0);
			$table->integer('fk_user_author')->nullable()->index('idx_facture_fourn_fk_user_author');
			$table->integer('fk_user_valid')->nullable()->index('idx_facture_fourn_fk_user_valid');
			$table->integer('fk_facture_source')->nullable();
			$table->integer('fk_projet')->nullable()->index('idx_facture_fourn_fk_projet');
			$table->integer('fk_cond_reglement')->nullable();
			$table->integer('fk_mode_reglement')->nullable();
			$table->date('date_lim_reglement')->nullable()->index('idx_facture_fourn_date_lim_reglement');
			$table->text('note_private', 65535)->nullable();
			$table->text('note_public', 65535)->nullable();
			$table->string('model_pdf')->nullable();
			$table->string('import_key', 14)->nullable();
			$table->string('extraparams')->nullable();
			$table->unique(['ref','entity'], 'uk_facture_fourn_ref');
			$table->unique(['ref_supplier','fk_soc','entity'], 'uk_facture_fourn_ref_supplier');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_facture_fourn');
	}

}
