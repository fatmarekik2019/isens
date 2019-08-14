<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCPaymentTermTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_payment_term', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('code', 16)->nullable();
			$table->smallInteger('sortorder')->nullable();
			$table->boolean('active')->nullable()->default(1);
			$table->string('libelle')->nullable();
			$table->text('libelle_facture', 65535)->nullable();
			$table->boolean('fdm')->nullable();
			$table->smallInteger('nbjour')->nullable();
			$table->smallInteger('decalage')->nullable();
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
		Schema::drop('llx_c_payment_term');
	}

}
