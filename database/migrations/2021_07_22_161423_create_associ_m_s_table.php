<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssociMSTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('associ_m_s', function(Blueprint $table)
		{
			$table->integer('Id_assoc', true);
			$table->integer('Id_maladie')->index('fk_id_maladie');
			$table->integer('Id_symptome')->index('fk_id_symp');
			$table->integer('Id_categorie')->index('fk_id_categ');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('associ_m_s');
	}

}
