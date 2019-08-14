<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxFactorydetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_factorydet', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_factory')->default(0);
			$table->integer('fk_product')->default(0);
			$table->float('qty_unit', 10, 0)->nullable();
			$table->float('qty_planned', 10, 0)->nullable();
			$table->float('qty_used', 10, 0)->nullable();
			$table->float('qty_deleted', 10, 0)->nullable();
			$table->float('pmp', 24, 8)->nullable()->default(0.00000000);
			$table->float('price', 24, 8)->nullable()->default(0.00000000);
			$table->integer('fk_mvtstockplanned')->default(0);
			$table->integer('fk_mvtstockused')->default(0);
			$table->integer('fk_mvtstockother')->default(0);
			$table->text('note_public', 65535)->nullable();
			$table->integer('globalqty')->default(0);
			$table->text('description', 65535)->nullable();
			$table->integer('ordercomponent')->default(0);
			$table->unique(['fk_factory','fk_product'], 'uk_factorydet');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_factorydet');
	}

}
