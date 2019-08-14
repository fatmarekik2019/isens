<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxBankUrlTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_bank_url', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_bank')->nullable();
			$table->integer('url_id')->nullable();
			$table->string('url')->nullable();
			$table->string('label')->nullable();
			$table->string('type', 20);
			$table->unique(['fk_bank','type'], 'uk_bank_url');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_bank_url');
	}

}
