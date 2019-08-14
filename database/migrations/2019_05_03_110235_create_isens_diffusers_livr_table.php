<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIsensDiffusersLivrTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('isens_diffusers_livr', function(Blueprint $table)
		{
			$table->integer('Id')->primary();
			$table->string('Name');
			$table->date('Date_Crea');
			$table->date('Date_Anniv');
			$table->date('Date_Renouv');
			$table->integer('Type_Ann');
			$table->integer('Nb_Ann');
			$table->integer('Parfum_Id');
			$table->decimal('New_Cons', 3);
			$table->decimal('Old_Cons', 3);
			$table->string('Type_Rec');
			$table->integer('Company_Id');
			$table->integer('Old_Prod');
			$table->boolean('automatic');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('isens_diffusers_livr');
	}

}
