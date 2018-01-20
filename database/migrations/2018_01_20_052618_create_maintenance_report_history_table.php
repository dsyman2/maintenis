<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaintenanceReportHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('maintenance_report_history', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_maintenance_report');
			$table->text('content', 65535);
			$table->integer('status');
			$table->date('date');
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
		Schema::drop('maintenance_report_history');
	}

}
