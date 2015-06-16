<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSurveyToEnterprises extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('enterprises', function(Blueprint $table)
		{
			$table->unsignedInteger('survey_id')->nullable();
			$table->foreign('survey_id')->references('id')->on('surveys')->onDelete('cascade')->onUpdate('cascade');
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
