<?php

use Illuminate\Database\Seeder;

class WithdrawRecordTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('withdraw_record')->delete();
        
        
        
    }
}