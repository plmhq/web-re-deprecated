<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMilestoneErasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('milestone_eras', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->timestamp('started_at');
			$table->timestamp('ended_at');
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
		Schema::dropIfExists('milestone_eras');
	}

}
