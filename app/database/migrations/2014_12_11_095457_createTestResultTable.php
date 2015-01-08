<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestResultTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TestResults', function($table)
		{
			$table->bigIncrements('id');
			$table->string('_meterId')->nullable();
			$table->string('_meterPlace')->nullable();
			$table->string('_serialNo')->nullable();
			$table->string('_meterNo')->nullable();
			$table->string('_scanCode')->nullable();
			$table->string('_model')->nullable();
			$table->string('_type')->nullable();
			$table->string('_voltage')->nullable();
			$table->string('_current')->nullable();
			$table->string('_constant')->nullable();
			$table->string('_precision')->nullable();
			$table->string('_wireModel')->nullable();
			$table->string('_frequency')->nullable();
			$table->string('_serialDate')->nullable();
			$table->string('_madePlace')->nullable();
			$table->string('_temp')->nullable();
			$table->string('_humidity')->nullable();
			$table->string('_tester')->nullable();
			$table->string('_retester')->nullable();
			$table->string('_manage')->nullable();
			$table->date('_testDate')->nullable();
			$table->string('_starTest')->nullable();
			$table->string('_hiddenTest')->nullable();
			$table->string('_stopTest')->nullable();
			$table->string('_startCurrent')->nullable();
			$table->string('_resistance')->nullable();
			$table->string('_piezo')->nullable();
			$table->string('_testYer')->nullable();
			$table->string('_testMon')->nullable();
			$table->string('_testDay')->nullable();
			$table->string('_minCurr')->nullable();
			$table->string('_walkTest')->nullable();
			$table->string('_startDeg')->nullable();
			$table->string('_endDeg')->nullable();
			$table->string('_cunduTotal')->nullable();
			$table->string('_cunduPeak')->nullable();
			$table->string('_cunudValey')->nullable();
			$table->string('_PNO')->nullable();
			$table->string('_TNO')->nullable();
			$table->string('_testUnit')->nullable();
			$table->string('_sMax')->nullable();
			$table->string('_forConclusion')->nullable();
			$table->string('_aftConclusion')->nullable();
			$table->string('_conclusion24h')->nullable();
			$table->string('_conclusion')->nullable();
			$table->string('_net')->nullable();
			$table->string('_startTime')->nullable();
			$table->string('_hideTime')->nullable();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('TestResults');
	}

}
