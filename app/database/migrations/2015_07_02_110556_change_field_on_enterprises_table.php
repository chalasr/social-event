<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFieldOnEnterprisesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('enterprises', function(Blueprint $table)
		{
			$table->dropColumn('internal_collaborators');
		});

		Schema::table('enterprises', function(Blueprint $table)
		{
				$table->string('internal_collaborators');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('enterprises', function(Blueprint $table)
		{
			//
		});
	}

}
