<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxSocieteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_societe', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->string('nom', 60)->nullable();
			$table->integer('entity')->default(1);
			$table->string('ref_ext', 128)->nullable();
			$table->string('ref_int', 60)->nullable();
			$table->boolean('statut')->nullable()->default(0);
			$table->integer('parent')->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('datec')->nullable();
			$table->boolean('status')->nullable()->default(1);
			$table->string('code_client', 24)->nullable();
			$table->string('code_fournisseur', 24)->nullable();
			$table->string('code_compta', 24)->nullable();
			$table->string('code_compta_fournisseur', 24)->nullable();
			$table->string('address')->nullable();
			$table->string('zip', 25)->nullable();
			$table->string('town', 50)->nullable();
			$table->integer('fk_departement')->nullable()->default(0);
			$table->integer('fk_pays')->nullable()->default(0);
			$table->string('phone', 20)->nullable();
			$table->string('fax', 20)->nullable();
			$table->string('url')->nullable();
			$table->string('email', 128)->nullable();
			$table->string('skype')->nullable();
			$table->integer('fk_effectif')->nullable()->default(0);
			$table->integer('fk_typent')->nullable()->default(0);
			$table->integer('fk_forme_juridique')->nullable()->default(0);
			$table->string('fk_currency', 3)->nullable();
			$table->string('siren', 128)->nullable();
			$table->string('siret', 128)->nullable();
			$table->string('ape', 128)->nullable();
			$table->string('idprof4', 128)->nullable();
			$table->string('idprof5', 128)->nullable();
			$table->string('idprof6', 128)->nullable();
			$table->string('tva_intra', 20)->nullable();
			$table->float('capital', 10, 0)->nullable();
			$table->integer('fk_stcomm')->default(0);
			$table->text('note_private', 65535)->nullable();
			$table->text('note_public', 65535)->nullable();
			$table->string('prefix_comm', 5)->nullable();
			$table->boolean('client')->nullable()->default(0);
			$table->boolean('fournisseur')->nullable()->default(0);
			$table->string('supplier_account', 32)->nullable();
			$table->string('fk_prospectlevel', 12)->nullable();
			$table->boolean('customer_bad')->nullable()->default(0);
			$table->float('customer_rate', 10, 0)->nullable()->default(0);
			$table->float('supplier_rate', 10, 0)->nullable()->default(0);
			$table->integer('fk_user_creat')->nullable();
			$table->integer('fk_user_modif')->nullable();
			$table->float('remise_client', 10, 0)->nullable()->default(0);
			$table->boolean('mode_reglement')->nullable();
			$table->boolean('cond_reglement')->nullable();
			$table->integer('mode_reglement_supplier')->nullable();
			$table->float('outstanding_limit', 24, 8)->nullable();
			$table->integer('cond_reglement_supplier')->nullable();
			$table->boolean('tva_assuj')->nullable()->default(1);
			$table->boolean('localtax1_assuj')->nullable()->default(0);
			$table->boolean('localtax2_assuj')->nullable()->default(0);
			$table->string('barcode')->nullable();
			$table->integer('fk_barcode_type')->nullable()->default(0);
			$table->integer('price_level')->nullable();
			$table->string('default_lang', 6)->nullable();
			$table->string('logo')->nullable();
			$table->string('canvas', 32)->nullable();
			$table->string('import_key', 14)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_societe');
	}

}
