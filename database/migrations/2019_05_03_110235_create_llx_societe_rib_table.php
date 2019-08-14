<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxSocieteRibTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_societe_rib', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->integer('fk_soc');
			$table->dateTime('datec')->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('label', 30)->nullable();
			$table->string('bank')->nullable();
			$table->string('code_banque', 7)->nullable();
			$table->string('code_guichet', 6)->nullable();
			$table->string('number')->nullable();
			$table->string('cle_rib', 5)->nullable();
			$table->string('bic', 20)->nullable();
			$table->string('iban_prefix', 34)->nullable();
			$table->string('domiciliation')->nullable();
			$table->string('proprio', 60)->nullable();
			$table->text('owner_address', 65535)->nullable();
			$table->smallInteger('default_rib')->default(0);
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
		Schema::drop('llx_societe_rib');
	}

}
