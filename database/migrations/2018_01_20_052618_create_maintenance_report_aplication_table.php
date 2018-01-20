<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaintenanceReportAplicationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('maintenance_report_aplication', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_maintenance_report');
			$table->string('version', 100);
			$table->string('url', 500);
			$table->text('changelog', 65535);
			$table->dateTime('created_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('maintenance_report_aplication');
	}

}
