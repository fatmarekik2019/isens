<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxEntrepotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_entrepot', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->dateTime('datec')->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('label');
			$table->integer('entity')->default(1);
			$table->text('description', 65535)->nullable();
			$table->string('lieu', 64)->nullable();
			$table->string('address')->nullable();
			$table->string('zip', 10)->nullable();
			$table->string('town', 50)->nullable();
			$table->integer('fk_departement')->nullable();
			$table->integer('fk_pays')->nullable()->default(0);
			$table->boolean('statut')->nullable()->default(1);
			$table->float('valo_pmp', 12, 4)->nullable();
			$table->integer('fk_user_author')->nullable();
			$table->string('import_key', 14)->nullable();
			$table->unique(['label','entity'], 'uk_entrepot_label');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_entrepot');
	}

}
