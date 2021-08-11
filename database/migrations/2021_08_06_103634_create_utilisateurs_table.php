<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('utilisateurs', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nom_utilisateur', 2000);
			$table->string('mdp', 2000);
			$table->string('nom', 2000);
			$table->string('prenom', 2000);
			$table->string('email', 2000);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('utilisateurs');
	}

}
