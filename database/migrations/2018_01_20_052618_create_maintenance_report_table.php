<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaintenanceReportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('maintenance_report', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_maintenance');
			$table->integer('month');
			$table->integer('year');
			$table->string('file_report', 500)->nullable();
			$table->integer('is_send');
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
		Schema::drop('maintenance_report');
	}

}
