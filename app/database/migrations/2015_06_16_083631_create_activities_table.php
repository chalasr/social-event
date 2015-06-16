<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activities', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('ca_2013');
			$table->string('net_2013');
			$table->string('effectif_2013');
			$table->string('rd_2013');
			$table->string('effectif_rd_2013');
			$table->string('ca_2014');
			$table->string('net_2014');
			$table->string('effectif_2014');
			$table->string('rd_2014');
			$table->string('effectif_rd_2014');
			$table->string('ca_2015');
			$table->string('net_2015');
			$table->string('effectif_2015');
			$table->string('rd_2015');
			$table->string('effectif_rd_2015');
			$table->unsignedInteger('enterprise_id')->nullable();
			$table->foreign('enterprise_id')->references('id')->on('enterprises')->onDelete('cascade')->onUpdate('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('activities');
	}

}
