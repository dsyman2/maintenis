<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaintenanceReportIssueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('maintenance_report_issue', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_maintenance_report');
			$table->date('issue_date');
			$table->string('issue_by', 100);
			$table->string('issue', 500);
			$table->integer('status');
			$table->date('fix_date');
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
		Schema::drop('maintenance_report_issue');
	}

}
