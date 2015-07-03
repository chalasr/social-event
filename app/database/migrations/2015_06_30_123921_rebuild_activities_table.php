<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RebuildActivitiesTable extends Migration {

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
			$table->string('ca_2013')->nullable();
			$table->string('net_2013')->nullable();
			$table->string('effectif_2013')->nullable();
			$table->string('rd_2013')->nullable();
			$table->string('effectif_rd_2013')->nullable();
			$table->string('ca_2014')->nullable();
			$table->string('net_2014')->nullable();
			$table->string('effectif_2014')->nullable();
			$table->string('rd_2014')->nullable();
			$table->string('effectif_rd_2014')->nullable();
			$table->string('ca_2015')->nullable();
			$table->string('net_2015')->nullable();
			$table->string('effectif_2015')->nullable();
			$table->string('rd_2015')->nullable();
			$table->string('effectif_rd_2015')->nullable();
			$table->unsignedInteger('enterprise_id')->nullable();
			$table->timestamps();
		});
		Schema::table('activities', function(Blueprint $table)
		{
			$table->foreign('enterprise_id')->references('id')->on('enterprises')->onDelete('cascade')->onUpdate('cascade');
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
