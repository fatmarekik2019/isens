<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIsensSavTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('isens_sav', function(Blueprint $table)
		{
			$table->integer('Id')->primary();
			$table->dateTime('Date_Crea');
			$table->dateTime('Date_Debut');
			$table->dateTime('Date_Fin');
			$table->integer('User_Id');
			$table->integer('Ope_User_Id')->nullable();
			$table->integer('Diffuser_Id');
			$table->string('Defauts');
			$table->boolean('Recep_Elec')->nullable();
			$table->boolean('Recep_Alim')->nullable();
			$table->boolean('Recep_Tete')->nullable();
			$table->boolean('Recep_Pomp')->nullable();
			$table->boolean('Recep_Sd')->nullable();
			$table->boolean('Recep_Boitier')->nullable();
			$table->boolean('ElecOK')->nullable();
			$table->boolean('AlimOK')->nullable();
			$table->boolean('TeteOK')->nullable();
			$table->boolean('PompOK')->nullable();
			$table->boolean('SdOK')->nullable();
			$table->boolean('BoitierOK')->nullable();
			$table->boolean('Boitier_Stock')->nullable();
			$table->text('Explication', 65535)->nullable();
			$table->boolean('Elec_Fonc')->nullable();
			$table->string('Elec_Comment')->nullable();
			$table->string('Elec_Action', 20)->nullable();
			$table->boolean('Alim_Fonc')->nullable();
			$table->string('Alim_Comment')->nullable();
			$table->string('Alim_Action', 20)->nullable();
			$table->boolean('Tete_Fonc')->nullable();
			$table->string('Tete_Comment')->nullable();
			$table->string('Tete_Action', 20)->nullable();
			$table->boolean('Pomp_Fonc')->nullable();
			$table->string('Pomp_Comment')->nullable();
			$table->string('Pomp_Action', 20)->nullable();
			$table->integer('Old_Pomp')->nullable();
			$table->integer('New_Pomp')->nullable();
			$table->boolean('Boitier_Fonc')->nullable();
			$table->string('Boitier_Comment')->nullable();
			$table->string('Boitier_Action', 20)->nullable();
			$table->integer('Final_Etat')->nullable();
			$table->text('Final_Comment', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('isens_sav');
	}

}
