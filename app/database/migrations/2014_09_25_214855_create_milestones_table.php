<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMilestonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('milestones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('era_id');
			$table->string('title');
			$table->text('content');
			$table->softDeletes();
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
		Schema::dropIfExists('milestones');
	}

}
