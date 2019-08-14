<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCPaiementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_paiement', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('code', 6)->unique('uk_c_paiement');
			$table->string('libelle', 30)->nullable();
			$table->smallInteger('type')->nullable();
			$table->boolean('active')->default(1);
			$table->string('module', 32)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_c_paiement');
	}

}
