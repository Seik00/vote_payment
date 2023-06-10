<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'admin1',
                'email' => 'admin@special.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Lzm5rlabGuCeKSPT1IOSB.WpazQJeqIzjTPUWXbakkGh0k5an3iZG',
                'remember_token' => 'bAl0cpAHkg72zQqC1Ln5yuzlx18vBYLdsoPxDivzPZMgzWb34O91NCL3IwVb',
                'point' => NULL,
                'created_at' => '2019-11-14 08:10:57',
                'updated_at' => '2019-11-14 08:10:57',
                'user_login_id' => 'admin',
                'mobile_no' => '0123456789',
                'is_active' => 1,
                'deactivate_reason' => NULL,
                'deactivate_at' => NULL,
                'is_notification_allow' => 1,
                'device_token' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 2,
                'name' => 'company',
                'email' => 'company@volservers.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Lzm5rlabGuCeKSPT1IOSB.WpazQJeqIzjTPUWXbakkGh0k5an3iZG',
                'remember_token' => 'hZ7ZYaW0T9QAUBAAFL4rGfk7W2858OGOFOTI92p0P4eaOPBSlzxLH80wF2vX',
                'point' => 210,
                'created_at' => '2019-11-14 08:10:57',
                'updated_at' => '2020-06-09 07:39:33',
                'user_login_id' => 'company',
                'mobile_no' => NULL,
                'is_active' => 1,
                'deactivate_reason' => NULL,
                'deactivate_at' => NULL,
                'is_notification_allow' => 1,
                'device_token' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'role_id' => 4,
                'name' => 'staff1',
                'email' => 'staff@test.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$czDTgO8a2x4BvG18xusJd.Ssrq/tB/QtSeKf0yY1vLv.A2LTqVugG',
                'remember_token' => NULL,
                'point' => 0,
                'created_at' => '2020-06-12 05:40:51',
                'updated_at' => '2020-06-12 05:40:51',
                'user_login_id' => 'staff',
                'mobile_no' => NULL,
                'is_active' => 1,
                'deactivate_reason' => NULL,
                'deactivate_at' => NULL,
                'is_notification_allow' => 1,
                'device_token' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'role_id' => 3,
                'name' => '0163593238',
                'email' => 'test@test.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$J.oiNTUaYaf6z2BQ30jl/.6VvrF2fq1D.j479eABvZvVSwZtpHrjK',
                'remember_token' => NULL,
                'point' => 0,
                'created_at' => '2020-06-15 10:10:19',
                'updated_at' => '2020-06-15 10:10:19',
                'user_login_id' => 'user',
                'mobile_no' => '0163593238',
                'is_active' => 1,
                'deactivate_reason' => NULL,
                'deactivate_at' => NULL,
                'is_notification_allow' => 1,
                'device_token' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'role_id' => 3,
                'name' => '0123456789',
                'email' => 'test@test2.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$uRUWO.AKWBklTOQvKv8vbev0FaQrz80svkIFfflTgkSm.0QsM1ooG',
                'remember_token' => NULL,
                'point' => 0,
                'created_at' => '2020-06-16 02:27:23',
                'updated_at' => '2020-06-16 02:27:23',
                'user_login_id' => 'user',
                'mobile_no' => '0123456789',
                'is_active' => 1,
                'deactivate_reason' => NULL,
                'deactivate_at' => NULL,
                'is_notification_allow' => 1,
                'device_token' => NULL,
            ),
        ));
        
        
    }
}