<?php

use Illuminate\Database\Seeder;

class OtpsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('otps')->delete();
        
        \DB::table('otps')->insert(array (
            0 => 
            array (
                'id' => 1,
                'otp_account' => '0163593238',
                'otp_code' => '115409',
                'otp_type' => '1',
                'reference_id' => 'fGNMtYge2tEtbeT5',
                'otp_attribute01' => NULL,
                'created_at' => '2020-06-15 10:09:53',
                'updated_at' => '2020-06-15 10:09:53',
            ),
            1 => 
            array (
                'id' => 2,
                'otp_account' => '0123456789',
                'otp_code' => '493414',
                'otp_type' => '1',
                'reference_id' => 'vtAojYK5iAr6eiag',
                'otp_attribute01' => NULL,
                'created_at' => '2020-06-16 02:25:50',
                'updated_at' => '2020-06-16 02:25:50',
            ),
        ));
        
        
    }
}