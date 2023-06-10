<?php

use Illuminate\Database\Seeder;

class WithdrawalLimitTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('withdrawal_limit')->delete();
        
        
        
    }
}