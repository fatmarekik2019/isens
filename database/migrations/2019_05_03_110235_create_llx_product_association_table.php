<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxProductAssociationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_product_association', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->integer('fk_product_pere')->default(0);
			$table->integer('fk_product_fils')->default(0);
			$table->float('qty', 10, 0)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_product_association');
	}

}
