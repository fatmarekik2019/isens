<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCEmailTemplatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_email_templates', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('entity')->default(1);
			$table->string('type_template', 32)->nullable();
			$table->dateTime('datec')->nullable();
			$table->string('label')->nullable();
			$table->text('content', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_c_email_templates');
	}

}
