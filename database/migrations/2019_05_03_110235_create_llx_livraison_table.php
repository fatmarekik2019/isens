<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxLivraisonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_livraison', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('ref', 30);
			$table->integer('entity')->default(1);
			$table->integer('fk_soc')->index('idx_livraison_fk_soc');
			$table->string('ref_ext', 30)->nullable();
			$table->string('ref_int', 30)->nullable();
			$table->string('ref_customer', 30)->nullable();
			$table->dateTime('date_creation')->nullable();
			$table->integer('fk_user_author')->nullable()->index('idx_livraison_fk_user_author');
			$table->dateTime('date_valid')->nullable();
			$table->integer('fk_user_valid')->nullable()->index('idx_livraison_fk_user_valid');
			$table->date('date_delivery')->nullable();
			$table->integer('fk_address')->nullable();
			$table->smallInteger('fk_statut')->nullable()->default(0);
			$table->float('total_ht', 24, 8)->nullable()->default(0.00000000);
			$table->text('note_private', 65535)->nullable();
			$table->text('note_public', 65535)->nullable();
			$table->string('model_pdf')->nullable();
			$table->unique(['ref','entity'], 'idx_livraison_uk_ref');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_livraison');
	}

}
