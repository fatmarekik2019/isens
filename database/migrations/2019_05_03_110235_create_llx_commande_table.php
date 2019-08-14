<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCommandeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_commande', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('ref', 30);
			$table->integer('entity')->default(1);
			$table->string('ref_ext')->nullable();
			$table->string('ref_int')->nullable();
			$table->string('ref_client')->nullable();
			$table->integer('fk_soc')->index('idx_commande_fk_soc');
			$table->integer('fk_projet')->nullable()->index('idx_commande_fk_projet');
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('date_creation')->nullable();
			$table->dateTime('date_valid')->nullable();
			$table->dateTime('date_cloture')->nullable();
			$table->date('date_commande')->nullable();
			$table->integer('fk_user_author')->nullable()->index('idx_commande_fk_user_author');
			$table->integer('fk_user_valid')->nullable()->index('idx_commande_fk_user_valid');
			$table->integer('fk_user_cloture')->nullable()->index('idx_commande_fk_user_cloture');
			$table->smallInteger('source')->nullable();
			$table->smallInteger('fk_statut')->nullable()->default(0);
			$table->float('amount_ht', 10, 0)->nullable()->default(0);
			$table->float('remise_percent', 10, 0)->nullable()->default(0);
			$table->float('remise_absolue', 10, 0)->nullable()->default(0);
			$table->float('remise', 10, 0)->nullable()->default(0);
			$table->float('tva', 24, 8)->nullable()->default(0.00000000);
			$table->float('localtax1', 24, 8)->nullable()->default(0.00000000);
			$table->float('localtax2', 24, 8)->nullable()->default(0.00000000);
			$table->float('total_ht', 24, 8)->nullable()->default(0.00000000);
			$table->float('total_ttc', 24, 8)->nullable()->default(0.00000000);
			$table->text('note_private', 65535)->nullable();
			$table->text('note_public', 65535)->nullable();
			$table->string('model_pdf')->nullable();
			$table->boolean('facture')->nullable()->default(0);
			$table->integer('fk_account')->nullable()->index('idx_commande_fk_account');
			$table->string('fk_currency', 3)->nullable()->index('idx_commande_fk_currency');
			$table->integer('fk_cond_reglement')->nullable();
			$table->integer('fk_mode_reglement')->nullable();
			$table->date('date_livraison')->nullable();
			$table->integer('fk_availability')->nullable();
			$table->integer('fk_input_reason')->nullable();
			$table->integer('fk_delivery_address')->nullable();
			$table->string('import_key', 14)->nullable();
			$table->string('extraparams')->nullable();
			$table->unique(['ref','entity'], 'uk_commande_ref');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_commande');
	}

}
