<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCategorieProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_categorie_product', function(Blueprint $table)
		{
			$table->integer('fk_categorie')->index('idx_categorie_product_fk_categorie');
			$table->integer('fk_product')->index('idx_categorie_product_fk_product');
			$table->string('import_key', 14)->nullable();
			$table->primary(['fk_categorie','fk_product']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_categorie_product');
	}

}
