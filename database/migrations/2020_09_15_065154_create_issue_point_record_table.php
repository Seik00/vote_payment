<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIssuePointRecordTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('issue_point_record', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('staff_id');
			$table->integer('user_id');
			$table->string('amount', 50)->default('0');
			$table->timestamps();
			$table->text('ref_no', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('issue_point_record');
	}

}
