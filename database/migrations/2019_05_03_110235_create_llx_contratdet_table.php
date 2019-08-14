<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxContratdetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_contratdet', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('fk_contrat')->index('idx_contratdet_fk_contrat');
			$table->integer('fk_product')->nullable()->index('idx_contratdet_fk_product');
			$table->smallInteger('statut')->nullable()->default(0);
			$table->text('label', 65535)->nullable();
			$table->text('description', 65535)->nullable();
			$table->integer('fk_remise_except')->nullable();
			$table->dateTime('date_commande')->nullable();
			$table->dateTime('date_ouverture_prevue')->nullable()->index('idx_contratdet_date_ouverture_prevue');
			$table->dateTime('date_ouverture')->nullable()->index('idx_contratdet_date_ouverture');
			$table->dateTime('date_fin_validite')->nullable()->index('idx_contratdet_date_fin_validite');
			$table->dateTime('date_cloture')->nullable();
			$table->float('tva_tx', 6, 3)->nullable()->default(0.000);
			$table->float('localtax1_tx', 6, 3)->nullable()->default(0.000);
			$table->string('localtax1_type', 10)->nullable();
			$table->float('localtax2_tx', 6, 3)->nullable()->default(0.000);
			$table->string('localtax2_type', 10)->nullable();
			$table->float('qty', 10, 0);
			$table->float('remise_percent', 10, 0)->nullable()->default(0);
			$table->float('subprice', 24, 8)->nullable()->default(0.00000000);
			$table->float('price_ht', 10, 0)->nullable();
			$table->float('remise', 10, 0)->nullable()->default(0);
			$table->float('total_ht', 24, 8)->nullable()->default(0.00000000);
			$table->float('total_tva', 24, 8)->nullable()->default(0.00000000);
			$table->float('total_localtax1', 24, 8)->nullable()->default(0.00000000);
			$table->float('total_localtax2', 24, 8)->nullable()->default(0.00000000);
			$table->float('total_ttc', 24, 8)->nullable()->default(0.00000000);
			$table->integer('product_type')->nullable()->default(1);
			$table->integer('info_bits')->nullable()->default(0);
			$table->integer('fk_product_fournisseur_price')->nullable();
			$table->float('buy_price_ht', 24, 8)->nullable()->default(0.00000000);
			$table->integer('fk_user_author')->default(0);
			$table->integer('fk_user_ouverture')->nullable();
			$table->integer('fk_user_cloture')->nullable();
			$table->text('commentaire', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_contratdet');
	}

}
