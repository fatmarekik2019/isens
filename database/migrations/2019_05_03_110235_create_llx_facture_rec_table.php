<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxFactureRecTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_facture_rec', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('titre', 50);
			$table->integer('entity')->default(1);
			$table->integer('fk_soc')->index('idx_facture_rec_fk_soc');
			$table->dateTime('datec')->nullable();
			$table->float('amount', 24, 8)->default(0.00000000);
			$table->float('remise', 10, 0)->nullable()->default(0);
			$table->float('remise_percent', 10, 0)->nullable()->default(0);
			$table->float('remise_absolue', 10, 0)->nullable()->default(0);
			$table->float('tva', 24, 8)->nullable()->default(0.00000000);
			$table->float('localtax1', 24, 8)->nullable()->default(0.00000000);
			$table->float('localtax2', 24, 8)->nullable()->default(0.00000000);
			$table->float('total', 24, 8)->nullable()->default(0.00000000);
			$table->float('total_ttc', 24, 8)->nullable()->default(0.00000000);
			$table->integer('fk_user_author')->nullable()->index('idx_facture_rec_fk_user_author');
			$table->integer('fk_projet')->nullable()->index('idx_facture_rec_fk_projet');
			$table->integer('fk_cond_reglement')->nullable()->default(0);
			$table->integer('fk_mode_reglement')->nullable()->default(0);
			$table->date('date_lim_reglement')->nullable();
			$table->text('note_private', 65535)->nullable();
			$table->text('note_public', 65535)->nullable();
			$table->integer('usenewprice')->nullable()->default(0);
			$table->integer('frequency')->nullable();
			$table->string('unit_frequency', 2)->nullable()->default('d');
			$table->dateTime('date_when')->nullable();
			$table->dateTime('date_last_gen')->nullable();
			$table->integer('nb_gen_done')->nullable();
			$table->integer('nb_gen_max')->nullable();
			$table->unique(['titre','entity'], 'idx_facture_rec_uk_titre');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_facture_rec');
	}

}
