<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxLivraisondetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_livraisondet', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_livraison')->nullable()->index('idx_livraisondet_fk_expedition');
			$table->integer('fk_origin_line')->nullable();
			$table->integer('fk_product')->nullable();
			$table->text('description', 65535)->nullable();
			$table->float('qty', 10, 0)->nullable();
			$table->float('subprice', 24, 8)->nullable()->default(0.00000000);
			$table->float('total_ht', 24, 8)->nullable()->default(0.00000000);
			$table->integer('rang')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_livraisondet');
	}

}
