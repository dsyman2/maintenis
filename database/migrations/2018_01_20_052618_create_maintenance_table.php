<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaintenanceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('maintenance', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_project');
			$table->string('type', 100);
			$table->float('total_nominal', 13, 0);
			$table->date('date_start');
			$table->date('date_end');
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
		Schema::drop('maintenance');
	}

}
