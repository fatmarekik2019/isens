<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxEquipementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_equipement', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_product')->nullable()->default(0)->index('idx_equipement_fk_product');
			$table->integer('fk_soc_fourn')->nullable()->default(0);
			$table->integer('fk_soc_client')->nullable()->default(0);
			$table->string('ref', 30);
			$table->text('numimmocompta', 65535)->nullable();
			$table->string('numversion', 30)->nullable();
			$table->integer('fk_facture_fourn')->nullable()->default(0);
			$table->integer('fk_facture')->nullable()->default(0);
			$table->integer('fk_entrepot')->nullable()->default(0);
			$table->integer('entity')->default(1);
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('datec')->nullable();
			$table->dateTime('datev')->nullable();
			$table->dateTime('dateo')->nullable();
			$table->dateTime('datee')->nullable();
			$table->integer('fk_user_author')->nullable();
			$table->integer('fk_user_valid')->nullable();
			$table->smallInteger('fk_statut')->nullable()->default(0);
			$table->integer('fk_etatequipement')->nullable();
			$table->text('localisation', 65535)->nullable();
			$table->text('description', 65535)->nullable();
			$table->text('note_private', 65535)->nullable();
			$table->text('note_public', 65535)->nullable();
			$table->string('model_pdf')->nullable();
			$table->string('extraparams')->nullable();
			$table->integer('quantity')->default(1);
			$table->string('import_key', 14)->nullable();
			$table->float('price', 24, 8)->nullable()->default(0.00000000);
			$table->float('pmp', 24, 8)->nullable()->default(0.00000000);
			$table->float('unitweight', 24, 8)->nullable()->default(0.00000000);
			$table->integer('Diffuser_Id')->nullable();
			$table->unique(['ref','entity'], 'uk_equipement_ref');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_equipement');
	}

}
