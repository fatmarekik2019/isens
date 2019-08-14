<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIsensDiffusersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('isens_diffusers', function(Blueprint $table)
		{
			$table->integer('Id')->primary();
			$table->integer('User_Id');
			$table->integer('Company_Id');
			$table->integer('Reseau_Id');
			$table->string('Name', 30);
			$table->string('Num_serie', 16);
			$table->string('Type', 20)->default('CLASSIC');
			$table->string('Country', 22);
			$table->string('City', 22);
			$table->text('Address', 65535);
			$table->integer('Postcode');
			$table->string('Oldcountry', 22);
			$table->string('Color');
			$table->boolean('Etat');
			$table->integer('Group_Liv');
			$table->integer('fk_equipement')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('isens_diffusers');
	}

}
