<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_list', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('event_name', 65535)->nullable();
			$table->text('event_detail')->nullable();
			$table->string('rates', 10);
			$table->integer('condition_id');
			$table->integer('status')->default(0);
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
		Schema::drop('event_list');
	}

}
