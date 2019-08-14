<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCategorieTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_categorie', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('entity')->default(1);
			$table->integer('fk_parent')->default(0);
			$table->string('label')->index('idx_categorie_label');
			$table->boolean('type')->default(1)->index('idx_categorie_type');
			$table->text('description', 65535)->nullable();
			$table->integer('fk_soc')->nullable();
			$table->boolean('visible')->default(1);
			$table->string('import_key', 14)->nullable();
			$table->unique(['entity','fk_parent','label','type'], 'uk_categorie_ref');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_categorie');
	}

}
