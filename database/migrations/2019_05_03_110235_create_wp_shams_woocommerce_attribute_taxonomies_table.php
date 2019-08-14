<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpShamsWoocommerceAttributeTaxonomiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_shams_woocommerce_attribute_taxonomies', function(Blueprint $table)
		{
			$table->bigInteger('attribute_id');
			$table->string('attribute_name', 200);
			$table->text('attribute_label')->nullable();
			$table->string('attribute_type', 200);
			$table->string('attribute_orderby', 200);
			$table->integer('attribute_public')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_shams_woocommerce_attribute_taxonomies');
	}

}
