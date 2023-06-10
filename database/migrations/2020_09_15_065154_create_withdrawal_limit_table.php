<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWithdrawalLimitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('withdrawal_limit', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id');
			$table->decimal('amount', 10, 3);
			$table->integer('event_id')->default(0);
			$table->integer('rates');
			$table->decimal('withdraw_limit', 10, 3);
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
		Schema::drop('withdrawal_limit');
	}

}
