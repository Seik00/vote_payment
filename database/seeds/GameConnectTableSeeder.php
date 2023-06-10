<?php

use Illuminate\Database\Seeder;

class GameConnectTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('game_connect')->delete();
        
        \DB::table('game_connect')->insert(array (
            0 => 
            array (
                'id' => 1,
                'action' => 'Receive Request',
                'link' => 'update_workshop',
                'api_data' => 'POST /api/thirdparty/UpdateWorkShop HTTP/1.1
Accept:          */*
Accept-Encoding: gzip, deflate, br
Connection:      keep-alive
Content-Length:  318
Content-Type:    application/json
Host:            localhost:8000
Postman-Token:   daf9d9a8-0658-43b9-af7b-dac193cf4bcb
User-Agent:      PostmanRuntime/7.26.3

{"PassIn":{"PolNo":["MR-01-17-MR-000371","ML-01-17-ML-002429","MR-01-17-MR-000371"],"ExpDate":["14 NOV 2021","31 AUG 2020","14 NOV 2021"],"SubmitDate":"18 Aug 2020","CheckSum":"25048932","EffDate":["14 NOV 2017","31 AUG 2017","14 NOV 2017"],"Status":["1","1","0"],"RequestDate":"18 AUG 2020","RequestTime":"12:09:29"}}',
                'created_at' => '2020-08-24 01:42:55',
                'updated_at' => '2020-08-24 01:42:55',
                'ip_address' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'action' => 'Receive Request',
                'link' => 'update_workshop',
                'api_data' => 'POST /api/thirdparty/UpdateWorkShop HTTP/1.1
Accept:          */*
Accept-Encoding: gzip, deflate, br
Connection:      keep-alive
Content-Length:  841
Content-Type:    application/json
Host:            localhost:8000
Postman-Token:   6b56ec42-4024-4224-8410-7082f221d3cd
User-Agent:      PostmanRuntime/7.26.3

{
"PassIn": {
"SubmitDate": "19 Aug 2020",
"CheckSum": 1718162,
"WorkShopList": [
{
"ShopName": "R.E. Valdez Auto Repair Shop",
"Latitude": "39.931283",
"Longitude": "-75.121778",
"Address": " Upper P. Burgos, Baguio, 2600 Benguet, Philippines",
"City": "Benguet",
"WorkShopId": "1",
"Contact": "1233321"
},
{
"ShopName": "R.E. Valdez Auto Repair Shop",
"Latitude": "39.931283",
"Longitude": "-75.121778",
"Address": " Upper P. Burgos, Baguio, 2600 Benguet, Philippines",
"City": "Benguet",
"WorkShopId": "2",
"Contact": "1233321"
}
],
"RequestDate": "19 Aug 2020",
"RequestTime": "12:58:32"
}
}',
                'created_at' => '2020-08-24 01:43:49',
                'updated_at' => '2020-08-24 01:43:49',
                'ip_address' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'action' => 'Receive Request',
                'link' => 'update_workshop',
                'api_data' => 'POST /api/thirdparty/UpdateWorkShop HTTP/1.1
Accept:          */*
Accept-Encoding: gzip, deflate, br
Connection:      keep-alive
Content-Length:  841
Content-Type:    application/json
Host:            localhost:8000
Postman-Token:   984e5ba1-73e4-43e2-8fbb-90a8045c9ffc
User-Agent:      PostmanRuntime/7.26.3

{
"PassIn": {
"SubmitDate": "19 Aug 2020",
"CheckSum": 1718162,
"WorkShopList": [
{
"ShopName": "R.E. Valdez Auto Repair Shop",
"Latitude": "39.931283",
"Longitude": "-75.121778",
"Address": " Upper P. Burgos, Baguio, 2600 Benguet, Philippines",
"City": "Benguet",
"WorkShopId": "1",
"Contact": "1233321"
},
{
"ShopName": "R.E. Valdez Auto Repair Shop",
"Latitude": "39.931283",
"Longitude": "-75.121778",
"Address": " Upper P. Burgos, Baguio, 2600 Benguet, Philippines",
"City": "Benguet",
"WorkShopId": "2",
"Contact": "1233321"
}
],
"RequestDate": "19 Aug 2020",
"RequestTime": "12:58:32"
}
}',
                'created_at' => '2020-08-24 01:44:29',
                'updated_at' => '2020-08-24 01:44:29',
                'ip_address' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'action' => 'Receive Request',
                'link' => 'update_workshop',
                'api_data' => 'POST /api/thirdparty/UpdateWorkShop HTTP/1.1
Accept:          */*
Accept-Encoding: gzip, deflate, br
Connection:      keep-alive
Content-Length:  841
Content-Type:    application/json
Host:            localhost:8000
Postman-Token:   35adc1d0-4c0d-4d6d-aecc-f705fb241a64
User-Agent:      PostmanRuntime/7.26.3

{
"PassIn": {
"SubmitDate": "19 Aug 2020",
"CheckSum": 1718157,
"WorkShopList": [
{
"ShopName": "R.E. Valdez Auto Repair Shop",
"Latitude": "39.931283",
"Longitude": "-75.121778",
"Address": " Upper P. Burgos, Baguio, 2600 Benguet, Philippines",
"City": "Benguet",
"WorkShopId": "1",
"Contact": "1233321"
},
{
"ShopName": "R.E. Valdez Auto Repair Shop",
"Latitude": "39.931283",
"Longitude": "-75.121778",
"Address": " Upper P. Burgos, Baguio, 2600 Benguet, Philippines",
"City": "Benguet",
"WorkShopId": "2",
"Contact": "1233321"
}
],
"RequestDate": "19 Aug 2020",
"RequestTime": "12:58:32"
}
}',
                'created_at' => '2020-08-24 01:44:39',
                'updated_at' => '2020-08-24 01:44:39',
                'ip_address' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'action' => 'Receive Request',
                'link' => 'update_workshop',
                'api_data' => 'POST /api/thirdparty/UpdateWorkShop HTTP/1.1
Accept:          */*
Accept-Encoding: gzip, deflate, br
Connection:      keep-alive
Content-Length:  846
Content-Type:    application/json
Host:            localhost:8000
Postman-Token:   d4784f4d-c192-46f8-9734-0491732aa2b2
User-Agent:      PostmanRuntime/7.26.3

{
"PassIn": {
"SubmitDate": "19 Aug 2020",
"CheckSum": 1718157,
"WorkShopList": [
{
"ShopName": "R.E. Valdez Auto Repair Shop22222",
"Latitude": "39.931283",
"Longitude": "-75.121778",
"Address": " Upper P. Burgos, Baguio, 2600 Benguet, Philippines",
"City": "Benguet",
"WorkShopId": "1",
"Contact": "1233321"
},
{
"ShopName": "R.E. Valdez Auto Repair Shop",
"Latitude": "39.931283",
"Longitude": "-75.121778",
"Address": " Upper P. Burgos, Baguio, 2600 Benguet, Philippines",
"City": "Benguet",
"WorkShopId": "2",
"Contact": "1233321"
}
],
"RequestDate": "19 Aug 2020",
"RequestTime": "12:58:32"
}
}',
                'created_at' => '2020-08-24 01:44:57',
                'updated_at' => '2020-08-24 01:44:57',
                'ip_address' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"24 Aug 2020","CheckSum":13535040,"PolNo":"MR-01-17-MR-000371","LossDate":"15 Sep 2020","Requester":"+6312333213","RequestDate":"24 Aug 2020","RequestTime":"09:51:39"}}',
                'created_at' => '2020-08-24 09:51:39',
                'updated_at' => '2020-08-24 09:51:39',
                'ip_address' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMREGVER.SUB',
            'api_data' => '{"PassMsg":"Date of Loss is BEYOND than Register Date (08-24-20).","PassErr":"1"}',
                'created_at' => '2020-08-24 09:51:43',
                'updated_at' => '2020-08-24 09:51:43',
                'ip_address' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"24 Aug 2020","CheckSum":13535040,"PolNo":"MR-01-17-MR-000371","LossDate":"15 Aug 2020","Requester":"+6312333213","RequestDate":"24 Aug 2020","RequestTime":"09:52:02"}}',
                'created_at' => '2020-08-24 09:52:02',
                'updated_at' => '2020-08-24 09:52:02',
                'ip_address' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMREGVER.SUB',
                'api_data' => '{"PassMsg":"","PassErr":"0","PassOut":{"SubmitDate":"24 Aug 2020","CheckSum":"7172103","ReplyRequester":"+6312333213","ReplyDate":"24 AUG 2020","ReplyTime":"09:51:57"}}',
                'created_at' => '2020-08-24 09:52:03',
                'updated_at' => '2020-08-24 09:52:03',
                'ip_address' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMPOLREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"24 Aug 2020","CheckSum":14646029,"PolNo":"MR-01-17-MR-000371","LossDate":"15 Aug 2020","Email":"admin@maa.com","RequestDate":"24 Aug 2020","RequestTime":"09:52:36","Requester":"123321123"}}',
                'created_at' => '2020-08-24 09:52:36',
                'updated_at' => '2020-08-24 09:52:36',
                'ip_address' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMPOLREG.SUB',
                'api_data' => '{"PassMsg":"","PassErr":"0","PassOut":{"PolNo":"MR-01-17-MR-000371","SubmitDate":"24 Aug 2020","CheckSum":"14141034","ClmStatus":"OPEN FILE","ReplyRequester":"09:52:36","ClaimNo":"MR1801010005","ReplyDate":"24 AUG 2020","PlateNo":"BOW-165","LossDate":"15 AUG 2020","ReplyTime":"09:52:31"}}',
                'created_at' => '2020-08-24 09:52:38',
                'updated_at' => '2020-08-24 09:52:38',
                'ip_address' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMPOLREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"24 Aug 2020","CheckSum":14646029,"PolNo":"MR-01-17-MR-000371","LossDate":"16 Aug 2020","Email":"admin@maa.com","RequestDate":"24 Aug 2020","RequestTime":"09:56:26","Requester":"123321123"}}',
                'created_at' => '2020-08-24 09:56:26',
                'updated_at' => '2020-08-24 09:56:26',
                'ip_address' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMPOLREG.SUB',
                'api_data' => '{"PassMsg":"","PassErr":"0","PassOut":{"PolNo":"MR-01-17-MR-000371","SubmitDate":"24 Aug 2020","CheckSum":"14141034","ClmStatus":"OPEN FILE","ReplyRequester":"09:56:26","ClaimNo":"MR1801010006","ReplyDate":"24 AUG 2020","PlateNo":"BOW-165","LossDate":"16 AUG 2020","ReplyTime":"09:56:21"}}',
                'created_at' => '2020-08-24 09:56:27',
                'updated_at' => '2020-08-24 09:56:27',
                'ip_address' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMPOLREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"24 Aug 2020","CheckSum":14646029,"PolNo":"MR-01-17-MR-000371","LossDate":"17 Aug 2020","Email":"admin@maa.com","RequestDate":"24 Aug 2020","RequestTime":"09:57:06","Requester":"123321123"}}',
                'created_at' => '2020-08-24 09:57:06',
                'updated_at' => '2020-08-24 09:57:06',
                'ip_address' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMPOLREG.SUB',
                'api_data' => '{"PassMsg":"","PassErr":"0","PassOut":{"PolNo":"MR-01-17-MR-000371","SubmitDate":"24 Aug 2020","CheckSum":"14141034","ClmStatus":"OPEN FILE","ReplyRequester":"09:57:06","ClaimNo":"MR1801010007","ReplyDate":"24 AUG 2020","PlateNo":"BOW-165","LossDate":"17 AUG 2020","ReplyTime":"09:57:01"}}',
                'created_at' => '2020-08-24 09:57:07',
                'updated_at' => '2020-08-24 09:57:07',
                'ip_address' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'action' => 'Receive Request',
                'link' => 'update_claim_status',
                'api_data' => '{"ClaimNo":"MR1801010007","SubmitDate":"24 Aug 2020","CheckSum":"25048932","ClmStatus":"In Progress","Message":"We will start progress  this claim","RequestDate":"24 AUG 2020","RequestTime":"12:09:29"}',
                'created_at' => '2020-08-24 02:15:46',
                'updated_at' => '2020-08-24 02:15:46',
                'ip_address' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'action' => 'Receive Request',
                'link' => 'update_claim_status',
                'api_data' => '{"ClaimNo":"MR1801010007","SubmitDate":"24 Aug 2020","CheckSum":"25048932","ClmStatus":"In Progress","Message":"We will start progress  this claim","RequestDate":"24 AUG 2020","RequestTime":"12:09:29"}',
                'created_at' => '2020-08-24 02:16:09',
                'updated_at' => '2020-08-24 02:16:09',
                'ip_address' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'action' => 'Receive Request',
                'link' => 'update_claim_status',
                'api_data' => '{"ClaimNo":"MR1801010007","SubmitDate":"24 Aug 2020","CheckSum":"1718157","ClmStatus":"In Progress","Message":"We will start progress  this claim","RequestDate":"24 AUG 2020","RequestTime":"12:09:29"}',
                'created_at' => '2020-08-24 02:16:22',
                'updated_at' => '2020-08-24 02:16:22',
                'ip_address' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'action' => 'Receive Request',
                'link' => 'update_claim_status',
                'api_data' => '{"ClaimNo":"MR1801010007","SubmitDate":"24 Aug 2020","CheckSum":"1718157","ClmStatus":"In Progress","Message":"We will start progress  this claim","RequestDate":"24 AUG 2020","RequestTime":"12:09:29"}',
                'created_at' => '2020-08-24 02:17:53',
                'updated_at' => '2020-08-24 02:17:53',
                'ip_address' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'action' => 'Receive Request',
                'link' => 'update_claim_status',
                'api_data' => '{"ClaimNo":"MR1801010007","SubmitDate":"24 Aug 2020","CheckSum":"1718157","ClmStatus":"In Progress","Message":"We will start progress  this claim","RequestDate":"24 AUG 2020","RequestTime":"12:09:29"}',
                'created_at' => '2020-08-24 02:18:18',
                'updated_at' => '2020-08-24 02:18:18',
                'ip_address' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'action' => 'Receive Request',
                'link' => 'update_policy',
                'api_data' => 'null',
                'created_at' => '2020-08-26 02:25:56',
                'updated_at' => '2020-08-26 02:25:56',
                'ip_address' => '127.0.0.1',
            ),
            21 => 
            array (
                'id' => 22,
                'action' => 'Receive Request',
                'link' => 'update_claim_status',
                'api_data' => '{"ClaimNo":"MR1801010007","SubmitDate":"24 Aug 2020","CheckSum":"1718157","ClmStatus":"In Progress","Message":"We will start progress  this claim","RequestDate":"24 AUG 2020","RequestTime":"12:09:29"}',
                'created_at' => '2020-08-26 02:26:59',
                'updated_at' => '2020-08-26 02:26:59',
                'ip_address' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'action' => 'Receive Request',
                'link' => 'update_policy',
                'api_data' => 'null',
                'created_at' => '2020-08-26 02:27:27',
                'updated_at' => '2020-08-26 02:27:27',
                'ip_address' => '127.0.0.1',
            ),
            23 => 
            array (
                'id' => 24,
                'action' => 'Receive Request',
                'link' => 'update_policy',
                'api_data' => 'null',
                'created_at' => '2020-08-26 02:28:47',
                'updated_at' => '2020-08-26 02:28:47',
                'ip_address' => '127.0.0.1',
            ),
            24 => 
            array (
                'id' => 25,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"28 Aug 2020","CheckSum":13535036,"PolNo":"ML-01-17-ML-002429","LossDate":"28 Aug 2020","Requester":"+6312333213","RequestDate":"28 Aug 2020","RequestTime":"09:58:19"}}',
                'created_at' => '2020-08-28 09:58:19',
                'updated_at' => '2020-08-28 09:58:19',
                'ip_address' => '127.0.0.1',
            ),
            25 => 
            array (
                'id' => 26,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193//PHP_GEN/subroutine/PHP.AM.CLMREGVER.SUB',
                'api_data' => '{"PassMsg":"","PassErr":"0","PassOut":{"SubmitDate":"28 Aug 2020","CheckSum":"7172099","ReplyRequester":"+6312333213","ReplyDate":"28 AUG 2020","ReplyTime":"09:58:07"}}',
                'created_at' => '2020-08-28 09:58:25',
                'updated_at' => '2020-08-28 09:58:25',
                'ip_address' => '127.0.0.1',
            ),
            26 => 
            array (
                'id' => 27,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"28 Aug 2020","CheckSum":13636035,"PolNo":"ML-01-17-ML-0024292","LossDate":"28 Aug 2020","Requester":"+6312333213","RequestDate":"28 Aug 2020","RequestTime":"09:59:07"}}',
                'created_at' => '2020-08-28 09:59:07',
                'updated_at' => '2020-08-28 09:59:07',
                'ip_address' => '127.0.0.1',
            ),
            27 => 
            array (
                'id' => 28,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193//PHP_GEN/subroutine/PHP.AM.CLMREGVER.SUB',
                'api_data' => '{"PassMsg":"ERROR !! Policy No. [ML-01-17-ML-0024292] is not in - \'POLICY.MAST1\'","PassErr":"1"}',
                'created_at' => '2020-08-28 09:59:07',
                'updated_at' => '2020-08-28 09:59:07',
                'ip_address' => '127.0.0.1',
            ),
            28 => 
            array (
                'id' => 29,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMPOLREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"28 Aug 2020","CheckSum":14646025,"PolNo":"MR-01-17-MR-000371","LossDate":"28 Aug 2020","Email":"admin@maa.com","RequestDate":"28 Aug 2020","RequestTime":"10:13:00","Requester":"123321123"}}',
                'created_at' => '2020-08-28 10:13:00',
                'updated_at' => '2020-08-28 10:13:00',
                'ip_address' => '127.0.0.1',
            ),
            29 => 
            array (
                'id' => 30,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMPOLREG.SUB',
                'api_data' => '{"PassMsg":"","PassErr":"0","PassOut":{"PolNo":"MR-01-17-MR-000371","SubmitDate":"28 Aug 2020","CheckSum":"14141030","ClmStatus":"OPEN FILE","ReplyRequester":"10:13:00","ClaimNo":"MR1801010008","ReplyDate":"28 AUG 2020","PlateNo":"BOW-165","LossDate":"28 AUG 2020","ReplyTime":"10:12:47"}}',
                'created_at' => '2020-08-28 10:13:03',
                'updated_at' => '2020-08-28 10:13:03',
                'ip_address' => '127.0.0.1',
            ),
            30 => 
            array (
                'id' => 31,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"28 Aug 2020","CheckSum":15858013,"PolNo":"MR-01-17-MR-000371","LossDate":"28 Aug 2020","Email":"admin@maa.com","AccidentLocation":"pantai dalam","RequestDate":"28 Aug 2020","RequestTime":"10:14:16","Requester":"123321123"}}',
                'created_at' => '2020-08-28 10:14:16',
                'updated_at' => '2020-08-28 10:14:16',
                'ip_address' => '127.0.0.1',
            ),
            31 => 
            array (
                'id' => 32,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassMsg":"ERROR !! Input Policy no is blank","PassErr":"1"}',
                'created_at' => '2020-08-28 10:14:17',
                'updated_at' => '2020-08-28 10:14:17',
                'ip_address' => '127.0.0.1',
            ),
            32 => 
            array (
                'id' => 33,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"28 Aug 2020","CheckSum":15858013,"PolicyNo":"MR-01-17-MR-000371","LossDate":"28 Aug 2020","Email":"admin@maa.com","AccidentLocation":"pantai dalam","RequestDate":"28 Aug 2020","RequestTime":"10:16:18","Requester":"123321123"}}',
                'created_at' => '2020-08-28 10:16:18',
                'updated_at' => '2020-08-28 10:16:18',
                'ip_address' => '127.0.0.1',
            ),
            33 => 
            array (
                'id' => 34,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassMsg":"","PassErr":"","PassOut":{"PolNo":"MR-01-17-MR-000371","SubmitDate":"28 Aug 2020","CheckSum":"13333038","ReplyRequester":"S","ReplyDate":"123321123","CncNo":"CNC18000008","ReplyTime":"28 AUG 2020"}}',
                'created_at' => '2020-08-28 10:16:19',
                'updated_at' => '2020-08-28 10:16:19',
                'ip_address' => '127.0.0.1',
            ),
            34 => 
            array (
                'id' => 35,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"28 Aug 2020","CheckSum":15858013,"PolicyNo":"MR-01-17-MR-000371","LossDate":"28 Aug 2020","Email":"admin@maa.com","AccidentLocation":"pantai dalam","RequestDate":"28 Aug 2020","RequestTime":"10:35:49","Requester":"123321123"}}',
                'created_at' => '2020-08-28 10:35:49',
                'updated_at' => '2020-08-28 10:35:49',
                'ip_address' => '127.0.0.1',
            ),
            35 => 
            array (
                'id' => 36,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassMsg":"","PassErr":"","PassOut":{"PolNo":"MR-01-17-MR-000371","SubmitDate":"28 Aug 2020","CheckSum":"13333038","ReplyRequester":"S","ReplyDate":"123321123","CncNo":"CNC18000015","ReplyTime":"28 AUG 2020"}}',
                'created_at' => '2020-08-28 10:35:49',
                'updated_at' => '2020-08-28 10:35:49',
                'ip_address' => '127.0.0.1',
            ),
            36 => 
            array (
                'id' => 37,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"28 Aug 2020","CheckSum":15858013,"PolicyNo":"MR-01-17-MR-000371","LossDate":"28 Aug 2020","Email":"admin@maa.com","AccidentLocation":"pantai dalam","RequestDate":"28 Aug 2020","RequestTime":"10:38:13","Requester":"123321123"}}',
                'created_at' => '2020-08-28 10:38:13',
                'updated_at' => '2020-08-28 10:38:13',
                'ip_address' => '127.0.0.1',
            ),
            37 => 
            array (
                'id' => 38,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassMsg":"","PassErr":"","PassOut":{"Status":"S","PolNo":"MR-01-17-MR-000371","SubmitDate":"28 Aug 2020","CheckSum":"13333038","ReplyRequester":"123321123","ReplyDate":"28 AUG 2020","CncNo":"CNC18000017","ReplyTime":"10:37:59"}}',
                'created_at' => '2020-08-28 10:38:13',
                'updated_at' => '2020-08-28 10:38:13',
                'ip_address' => '127.0.0.1',
            ),
            38 => 
            array (
                'id' => 39,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"28 Aug 2020","CheckSum":15858013,"PolicyNo":"MR-01-17-MR-000371","LossDate":"28 Aug 2020","Email":"admin@maa.com","AccidentLocation":"pantai dalam","RequestDate":"28 Aug 2020","RequestTime":"10:38:38","Requester":"123321123"}}',
                'created_at' => '2020-08-28 10:38:38',
                'updated_at' => '2020-08-28 10:38:38',
                'ip_address' => '127.0.0.1',
            ),
            39 => 
            array (
                'id' => 40,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassMsg":"","PassErr":"","PassOut":{"Status":"S","PolNo":"MR-01-17-MR-000371","SubmitDate":"28 Aug 2020","CheckSum":"13333038","ReplyRequester":"123321123","ReplyDate":"28 AUG 2020","CncNo":"CNC18000018","ReplyTime":"10:38:24"}}',
                'created_at' => '2020-08-28 10:38:38',
                'updated_at' => '2020-08-28 10:38:38',
                'ip_address' => '127.0.0.1',
            ),
            40 => 
            array (
                'id' => 41,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"28 Aug 2020","CheckSum":15858013,"PolicyNo":"MR-01-17-MR-000371","LossDate":"28 Aug 2020","Email":"admin@maa.com","AccidentLocation":"pantai dalam","RequestDate":"28 Aug 2020","RequestTime":"10:39:10","Requester":"123321123"}}',
                'created_at' => '2020-08-28 10:39:10',
                'updated_at' => '2020-08-28 10:39:10',
                'ip_address' => '127.0.0.1',
            ),
            41 => 
            array (
                'id' => 42,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassMsg":"","PassErr":"","PassOut":{"Status":"S","PolNo":"MR-01-17-MR-000371","SubmitDate":"28 Aug 2020","CheckSum":"13333038","ReplyRequester":"123321123","ReplyDate":"28 AUG 2020","CncNo":"CNC18000019","ReplyTime":"10:38:56"}}',
                'created_at' => '2020-08-28 10:39:10',
                'updated_at' => '2020-08-28 10:39:10',
                'ip_address' => '127.0.0.1',
            ),
            42 => 
            array (
                'id' => 43,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"28 Aug 2020","CheckSum":15858013,"PolicyNo":"MR-01-17-MR-000371","LossDate":"28 Aug 2020","Email":"admin@maa.com","AccidentLocation":"pantai dalam","RequestDate":"28 Aug 2020","RequestTime":"10:39:51","Requester":"123321123"}}',
                'created_at' => '2020-08-28 10:39:51',
                'updated_at' => '2020-08-28 10:39:51',
                'ip_address' => '127.0.0.1',
            ),
            43 => 
            array (
                'id' => 44,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassMsg":"","PassErr":"","PassOut":{"Status":"S","PolNo":"MR-01-17-MR-000371","SubmitDate":"28 Aug 2020","CheckSum":"13333038","ReplyRequester":"123321123","ReplyDate":"28 AUG 2020","CncNo":"CNC18000020","ReplyTime":"10:39:37"}}',
                'created_at' => '2020-08-28 10:39:51',
                'updated_at' => '2020-08-28 10:39:51',
                'ip_address' => '127.0.0.1',
            ),
            44 => 
            array (
                'id' => 45,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"28 Aug 2020","CheckSum":15858013,"PolicyNo":"MR-01-17-MR-000371","LossDate":"28 Aug 2020","Email":"admin@maa.com","AccidentLocation":"pantai dalam","RequestDate":"28 Aug 2020","RequestTime":"10:40:28","Requester":"123321123"}}',
                'created_at' => '2020-08-28 10:40:28',
                'updated_at' => '2020-08-28 10:40:28',
                'ip_address' => '127.0.0.1',
            ),
            45 => 
            array (
                'id' => 46,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassMsg":"","PassErr":"","PassOut":{"Status":"S","PolNo":"MR-01-17-MR-000371","SubmitDate":"28 Aug 2020","CheckSum":"13333038","ReplyRequester":"123321123","ReplyDate":"28 AUG 2020","CncNo":"CNC18000021","ReplyTime":"10:40:14"}}',
                'created_at' => '2020-08-28 10:40:28',
                'updated_at' => '2020-08-28 10:40:28',
                'ip_address' => '127.0.0.1',
            ),
            46 => 
            array (
                'id' => 47,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"28 Aug 2020","CheckSum":15858013,"PolicyNo":"MR-01-17-MR-000371","LossDate":"28 Aug 2020","Email":"admin@maa.com","AccidentLocation":"pantai dalam","RequestDate":"28 Aug 2020","RequestTime":"11:54:31","Requester":"123321123"}}',
                'created_at' => '2020-08-28 11:54:31',
                'updated_at' => '2020-08-28 11:54:31',
                'ip_address' => '127.0.0.1',
            ),
            47 => 
            array (
                'id' => 48,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '0',
                'created_at' => '2020-08-28 11:54:52',
                'updated_at' => '2020-08-28 11:54:52',
                'ip_address' => '127.0.0.1',
            ),
            48 => 
            array (
                'id' => 49,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"28 Aug 2020","CheckSum":15858013,"PolicyNo":"MR-01-17-MR-000371","LossDate":"28 Aug 2020","Email":"admin@maa.com","AccidentLocation":"pantai dalam","RequestDate":"28 Aug 2020","RequestTime":"11:55:43","Requester":"123321123"}}',
                'created_at' => '2020-08-28 11:55:43',
                'updated_at' => '2020-08-28 11:55:43',
                'ip_address' => '127.0.0.1',
            ),
            49 => 
            array (
                'id' => 50,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '0',
                'created_at' => '2020-08-28 11:56:04',
                'updated_at' => '2020-08-28 11:56:04',
                'ip_address' => '127.0.0.1',
            ),
            50 => 
            array (
                'id' => 51,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"28 Aug 2020","CheckSum":15858013,"PolicyNo":"MR-01-17-MR-000371","LossDate":"28 Aug 2020","Email":"admin@maa.com","AccidentLocation":"pantai dalam","RequestDate":"28 Aug 2020","RequestTime":"11:56:13","Requester":"123321123"}}',
                'created_at' => '2020-08-28 11:56:13',
                'updated_at' => '2020-08-28 11:56:13',
                'ip_address' => '127.0.0.1',
            ),
            51 => 
            array (
                'id' => 52,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '0',
                'created_at' => '2020-08-28 11:56:34',
                'updated_at' => '2020-08-28 11:56:34',
                'ip_address' => '127.0.0.1',
            ),
            52 => 
            array (
                'id' => 53,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"28 Aug 2020","CheckSum":15858013,"PolicyNo":"MR-01-17-MR-000371","LossDate":"28 Aug 2020","Email":"admin@maa.com","AccidentLocation":"pantai dalam","RequestDate":"28 Aug 2020","RequestTime":"11:57:00","Requester":"123321123"}}',
                'created_at' => '2020-08-28 11:57:00',
                'updated_at' => '2020-08-28 11:57:00',
                'ip_address' => '127.0.0.1',
            ),
            53 => 
            array (
                'id' => 54,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '0',
                'created_at' => '2020-08-28 11:57:21',
                'updated_at' => '2020-08-28 11:57:21',
                'ip_address' => '127.0.0.1',
            ),
            54 => 
            array (
                'id' => 55,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"28 Aug 2020","CheckSum":15858013,"PolicyNo":"MR-01-17-MR-000371","LossDate":"28 Aug 2020","Email":"admin@maa.com","AccidentLocation":"pantai dalam","RequestDate":"28 Aug 2020","RequestTime":"11:57:44","Requester":"123321123"}}',
                'created_at' => '2020-08-28 11:57:44',
                'updated_at' => '2020-08-28 11:57:44',
                'ip_address' => '127.0.0.1',
            ),
            55 => 
            array (
                'id' => 56,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '0',
                'created_at' => '2020-08-28 11:58:05',
                'updated_at' => '2020-08-28 11:58:05',
                'ip_address' => '127.0.0.1',
            ),
            56 => 
            array (
                'id' => 57,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"28 Aug 2020","CheckSum":15858013,"PolNo":"MR-01-17-MR-000371","LossDate":"28 Aug 2020","Email":"admin@maa.com","AccidentLocation":"pantai dalam","RequestDate":"28 Aug 2020","RequestTime":"11:58:48","Requester":"123321123"}}',
                'created_at' => '2020-08-28 11:58:48',
                'updated_at' => '2020-08-28 11:58:48',
                'ip_address' => '127.0.0.1',
            ),
            57 => 
            array (
                'id' => 58,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '0',
                'created_at' => '2020-08-28 11:59:09',
                'updated_at' => '2020-08-28 11:59:09',
                'ip_address' => '127.0.0.1',
            ),
            58 => 
            array (
                'id' => 59,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"28 Aug 2020","CheckSum":15858013,"PolNo":"MR-01-17-MR-000371","LossDate":"28 Aug 2020","Email":"admin@maa.com","AccidentLocation":"pantai dalam","RequestDate":"28 Aug 2020","RequestTime":"12:00:08","Requester":"123321123"}}',
                'created_at' => '2020-08-28 12:00:08',
                'updated_at' => '2020-08-28 12:00:08',
                'ip_address' => '127.0.0.1',
            ),
            59 => 
            array (
                'id' => 60,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '0',
                'created_at' => '2020-08-28 12:00:30',
                'updated_at' => '2020-08-28 12:00:30',
                'ip_address' => '127.0.0.1',
            ),
            60 => 
            array (
                'id' => 61,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"28 Aug 2020","CheckSum":13535036,"PolNo":"MR-01-17-MR-000371","LossDate":"21 Dec 2020","Requester":"+6312333213","RequestDate":"28 Aug 2020","RequestTime":"12:00:35"}}',
                'created_at' => '2020-08-28 12:00:35',
                'updated_at' => '2020-08-28 12:00:35',
                'ip_address' => '127.0.0.1',
            ),
            61 => 
            array (
                'id' => 62,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMREGVER.SUB',
                'api_data' => '0',
                'created_at' => '2020-08-28 12:00:56',
                'updated_at' => '2020-08-28 12:00:56',
                'ip_address' => '127.0.0.1',
            ),
            62 => 
            array (
                'id' => 63,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"28 Aug 2020","CheckSum":13535036,"PolNo":"MR-01-17-MR-000371","LossDate":"21 Dec 2020","Requester":"+6312333213","RequestDate":"28 Aug 2020","RequestTime":"12:03:57"}}',
                'created_at' => '2020-08-28 12:03:57',
                'updated_at' => '2020-08-28 12:03:57',
                'ip_address' => '127.0.0.1',
            ),
            63 => 
            array (
                'id' => 64,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMREGVER.SUB',
            'api_data' => '{"PassMsg":"Date of Loss is BEYOND than Register Date (08-28-20).","PassErr":"1"}',
                'created_at' => '2020-08-28 12:03:57',
                'updated_at' => '2020-08-28 12:03:57',
                'ip_address' => '127.0.0.1',
            ),
            64 => 
            array (
                'id' => 65,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"28 Aug 2020","CheckSum":15858013,"PolNo":"MR-01-17-MR-000371","LossDate":"28 Aug 2020","Email":"admin@maa.com","AccidentLocation":"pantai dalam","RequestDate":"28 Aug 2020","RequestTime":"12:04:13","Requester":"123321123"}}',
                'created_at' => '2020-08-28 12:04:13',
                'updated_at' => '2020-08-28 12:04:13',
                'ip_address' => '127.0.0.1',
            ),
            65 => 
            array (
                'id' => 66,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassMsg":"","PassErr":"","PassOut":{"Status":"S","PolNo":"MR-01-17-MR-000371","SubmitDate":"28 Aug 2020","CheckSum":"13333038","ReplyRequester":"123321123","ReplyDate":"28 AUG 2020","CncNo":"CNC18000024","ReplyTime":"12:03:59"}}',
                'created_at' => '2020-08-28 12:04:13',
                'updated_at' => '2020-08-28 12:04:13',
                'ip_address' => '127.0.0.1',
            ),
            66 => 
            array (
                'id' => 67,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"28 Aug 2020","CheckSum":15858013,"PolNo":"MR-01-17-MR-000371","LossDate":"28 Aug 2020","Email":"admin@maa.com","AccidentLocation":"pantai dalam","RequestDate":"28 Aug 2020","RequestTime":"12:05:08","Requester":"123321123"}}',
                'created_at' => '2020-08-28 12:05:08',
                'updated_at' => '2020-08-28 12:05:08',
                'ip_address' => '127.0.0.1',
            ),
            67 => 
            array (
                'id' => 68,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassMsg":"","PassErr":"","PassOut":{"Status":"S","PolNo":"MR-01-17-MR-000371","SubmitDate":"28 Aug 2020","CheckSum":"13333038","ReplyRequester":"123321123","ReplyDate":"28 AUG 2020","CncNo":"CNC18000025","ReplyTime":"12:04:54"}}',
                'created_at' => '2020-08-28 12:05:08',
                'updated_at' => '2020-08-28 12:05:08',
                'ip_address' => '127.0.0.1',
            ),
            68 => 
            array (
                'id' => 69,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"28 Aug 2020","CheckSum":15858013,"PolNo":"MR-01-17-MR-000371","LossDate":"28 Aug 2020","Email":"admin@maa.com","AccidentLocation":"pantai dalam","RequestDate":"28 Aug 2020","RequestTime":"12:07:59","Requester":"123321123"}}',
                'created_at' => '2020-08-28 12:07:59',
                'updated_at' => '2020-08-28 12:07:59',
                'ip_address' => '127.0.0.1',
            ),
            69 => 
            array (
                'id' => 70,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassMsg":"","PassErr":"","PassOut":{"Status":"S","PolNo":"MR-01-17-MR-000371","SubmitDate":"28 Aug 2020","CheckSum":"13333038","ReplyRequester":"123321123","ReplyDate":"28 AUG 2020","CncNo":"CNC18000026","ReplyTime":"12:07:46"}}',
                'created_at' => '2020-08-28 12:08:00',
                'updated_at' => '2020-08-28 12:08:00',
                'ip_address' => '127.0.0.1',
            ),
            70 => 
            array (
                'id' => 71,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"28 Aug 2020","CheckSum":15858013,"PolNo":"MR-01-17-MR-000371","LossDate":"28 Aug 2020","Email":"admin@maa.com","AccidentLocation":"pantai dalam","RequestDate":"28 Aug 2020","RequestTime":"12:09:46","Requester":"123321123"}}',
                'created_at' => '2020-08-28 12:09:46',
                'updated_at' => '2020-08-28 12:09:46',
                'ip_address' => '127.0.0.1',
            ),
            71 => 
            array (
                'id' => 72,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMCNCREG.SUB',
                'api_data' => '{"PassMsg":"","PassErr":"","PassOut":{"Status":"S","PolNo":"MR-01-17-MR-000371","SubmitDate":"28 Aug 2020","CheckSum":"13333038","ReplyRequester":"123321123","ReplyDate":"28 AUG 2020","CncNo":"CNC18000027","ReplyTime":"12:09:32"}}',
                'created_at' => '2020-08-28 12:09:46',
                'updated_at' => '2020-08-28 12:09:46',
                'ip_address' => '127.0.0.1',
            ),
            72 => 
            array (
                'id' => 73,
                'action' => 'Receive Request',
                'link' => 'update_claim_status',
                'api_data' => '{"CncNo":"MR1801010007","SubmitDate":"28 Aug 2020","CheckSum":"1718157","Status":"In Progress","FilePath":"We will start progress  this claim","RequestDate":"28 AUG 2020","RequestTime":"12:09:29"}',
                'created_at' => '2020-08-28 06:02:40',
                'updated_at' => '2020-08-28 06:02:40',
                'ip_address' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
                'action' => 'Receive Request',
                'link' => 'update_cnc_status',
                'api_data' => '{"CncNo":"MR1801010007","SubmitDate":"28 Aug 2020","CheckSum":"1718157","Status":"In Progress","FilePath":"We will start progress  this claim","RequestDate":"28 AUG 2020","RequestTime":"12:09:29"}',
                'created_at' => '2020-08-28 06:03:27',
                'updated_at' => '2020-08-28 06:03:27',
                'ip_address' => NULL,
            ),
            74 => 
            array (
                'id' => 75,
                'action' => 'Receive Request',
                'link' => 'update_cnc_status',
                'api_data' => '{"CncNo":"MR1801010007","SubmitDate":"28 Aug 2020","CheckSum":"1718157","Status":"In Progress","FilePath":"We will start progress  this claim","RequestDate":"28 AUG 2020","RequestTime":"12:09:29"}',
                'created_at' => '2020-08-28 06:03:58',
                'updated_at' => '2020-08-28 06:03:58',
                'ip_address' => NULL,
            ),
            75 => 
            array (
                'id' => 76,
                'action' => 'Receive Request',
                'link' => 'update_cnc_status',
                'api_data' => '{"CncNo":"MR1801010007","SubmitDate":"28 Aug 2020","CheckSum":"1718153","Status":"In Progress","FilePath":"We will start progress  this claim","RequestDate":"28 AUG 2020","RequestTime":"12:09:29"}',
                'created_at' => '2020-08-28 06:04:30',
                'updated_at' => '2020-08-28 06:04:30',
                'ip_address' => NULL,
            ),
            76 => 
            array (
                'id' => 77,
                'action' => 'Receive Request',
                'link' => 'update_cnc_status',
                'api_data' => '{"CncNo":"CNC18000027","SubmitDate":"28 Aug 2020","CheckSum":"1718153","Status":"In Progress","FilePath":"We will start progress  this claim","RequestDate":"28 AUG 2020","RequestTime":"12:09:29"}',
                'created_at' => '2020-08-28 06:04:52',
                'updated_at' => '2020-08-28 06:04:52',
                'ip_address' => NULL,
            ),
            77 => 
            array (
                'id' => 78,
                'action' => 'Receive Request',
                'link' => 'update_cnc_status',
                'api_data' => '{"CncNo":"CNC18000027","SubmitDate":"28 Aug 2020","CheckSum":"1718153","Status":"In Progress","FilePath":"We will start progress  this claim","RequestDate":"28 AUG 2020","RequestTime":"12:09:29"}',
                'created_at' => '2020-08-28 06:05:18',
                'updated_at' => '2020-08-28 06:05:18',
                'ip_address' => NULL,
            ),
            78 => 
            array (
                'id' => 79,
                'action' => 'Receive Request',
                'link' => 'update_cnc_status',
                'api_data' => '{"CncNo":"CNC18000028","SubmitDate":"28 Aug 2020","CheckSum":"1718153","Status":"P","FilePath":null,"RequestDate":"28 AUG 2020","RequestTime":"12:09:29"}',
                'created_at' => '2020-08-28 10:01:21',
                'updated_at' => '2020-08-28 10:01:21',
                'ip_address' => NULL,
            ),
            79 => 
            array (
                'id' => 80,
                'action' => 'Receive Request',
                'link' => 'update_cnc_status',
                'api_data' => '{"CncNo":"CNC18000028","SubmitDate":"28 Aug 2020","CheckSum":"1718153","Status":"P","FilePath":null,"RequestDate":"28 AUG 2020","RequestTime":"12:09:29"}',
                'created_at' => '2020-08-28 10:02:26',
                'updated_at' => '2020-08-28 10:02:26',
                'ip_address' => NULL,
            ),
            80 => 
            array (
                'id' => 81,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":13534961,"PolNo":["MU-01-17-DA-000368"],"ExpDate":["18 Sep 2020"],"Requester":"+6312333213","RequestDate":"03 Sep 2020","RequestTime":"09:55:22"}}',
                'created_at' => '2020-09-03 09:55:22',
                'updated_at' => '2020-09-03 09:55:22',
                'ip_address' => '127.0.0.1',
            ),
            81 => 
            array (
                'id' => 82,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassMsg":{"ErrMsg":["ERROR !!, +6312333213 had registered the policy"]},"PassErr":"1","PassOut":{"PolNo":[],"ExpDate":[],"SubmitDate":"03 Sep 2020","CheckSum":"26664831","InsuredName":[],"ReplyRequester":"+6312333213","EffDate":[],"TowInd":[],"ReplyDate":"","PlateNo":[],"ReplyTime":""}}',
                'created_at' => '2020-09-03 09:55:22',
                'updated_at' => '2020-09-03 09:55:22',
                'ip_address' => '127.0.0.1',
            ),
            82 => 
            array (
                'id' => 83,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":13534961,"PolNo":["MU-01-17-DA-000368"],"ExpDate":["18 Sep 2020"],"Requester":"+6312333213","RequestDate":"03 Sep 2020","RequestTime":"09:56:02"}}',
                'created_at' => '2020-09-03 09:56:02',
                'updated_at' => '2020-09-03 09:56:02',
                'ip_address' => '127.0.0.1',
            ),
            83 => 
            array (
                'id' => 84,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassMsg":{"ErrMsg":["ERROR !!, +6312333213 had registered the policy"]},"PassErr":"1","PassOut":{"PolNo":[],"ExpDate":[],"SubmitDate":"03 Sep 2020","CheckSum":"26664831","InsuredName":[],"ReplyRequester":"+6312333213","EffDate":[],"TowInd":[],"ReplyDate":"","PlateNo":[],"ReplyTime":""}}',
                'created_at' => '2020-09-03 09:56:02',
                'updated_at' => '2020-09-03 09:56:02',
                'ip_address' => '127.0.0.1',
            ),
            84 => 
            array (
                'id' => 85,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":16463932,"PolNo":["MU-01-17-DA-000368","MU-01-17-DA-000368"],"ExpDate":["18 Sep 2020","18 Sep 2020"],"Requester":"+6312333213","RequestDate":"03 Sep 2020","RequestTime":"09:56:42"}}',
                'created_at' => '2020-09-03 09:56:42',
                'updated_at' => '2020-09-03 09:56:42',
                'ip_address' => '127.0.0.1',
            ),
            85 => 
            array (
                'id' => 86,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassMsg":{"ErrMsg":["ERROR !!, +6312333213 had registered the policy","ERROR !!, +6312333213 had registered the policy"]},"PassErr":"1","PassOut":{"PolNo":[],"ExpDate":[],"SubmitDate":"03 Sep 2020","CheckSum":"26664831","InsuredName":[],"ReplyRequester":"+6312333213","EffDate":[],"TowInd":[],"ReplyDate":"","PlateNo":[],"ReplyTime":""}}',
                'created_at' => '2020-09-03 09:56:43',
                'updated_at' => '2020-09-03 09:56:43',
                'ip_address' => '127.0.0.1',
            ),
            86 => 
            array (
                'id' => 87,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":16463932,"PolNo":["MU-01-17-DA-000368","MU-01-17-DA-000368"],"ExpDate":["18 Sep 2020","18 Sep 2020"],"Requester":"+6312333213","RequestDate":"03 Sep 2020","RequestTime":"09:59:22"}}',
                'created_at' => '2020-09-03 09:59:22',
                'updated_at' => '2020-09-03 09:59:22',
                'ip_address' => '127.0.0.1',
            ),
            87 => 
            array (
                'id' => 88,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassMsg":{"ErrMsg":["ERROR !!, +6312333213 had registered the policy","ERROR !!, +6312333213 had registered the policy"]},"PassErr":"1","PassOut":{"PolNo":[],"ExpDate":[],"SubmitDate":"03 Sep 2020","CheckSum":"26664831","InsuredName":[],"ReplyRequester":"+6312333213","EffDate":[],"TowInd":[],"ReplyDate":"","PlateNo":[],"ReplyTime":""}}',
                'created_at' => '2020-09-03 09:59:22',
                'updated_at' => '2020-09-03 09:59:22',
                'ip_address' => '127.0.0.1',
            ),
            88 => 
            array (
                'id' => 89,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":16463932,"PolNo":["MU-01-17-DA-000368","MU-01-17-DA-000368"],"ExpDate":["18 Sep 2020","18 Sep 2020"],"Requester":"+6312333213","RequestDate":"03 Sep 2020","RequestTime":"10:00:19"}}',
                'created_at' => '2020-09-03 10:00:19',
                'updated_at' => '2020-09-03 10:00:19',
                'ip_address' => '127.0.0.1',
            ),
            89 => 
            array (
                'id' => 90,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassMsg":{"ErrMsg":["ERROR !!, +6312333213 had registered the policy","ERROR !!, +6312333213 had registered the policy"]},"PassErr":"1","PassOut":{"PolNo":[],"ExpDate":[],"SubmitDate":"03 Sep 2020","CheckSum":"26664831","InsuredName":[],"ReplyRequester":"+6312333213","EffDate":[],"TowInd":[],"ReplyDate":"","PlateNo":[],"ReplyTime":""}}',
                'created_at' => '2020-09-03 10:00:19',
                'updated_at' => '2020-09-03 10:00:19',
                'ip_address' => '127.0.0.1',
            ),
            90 => 
            array (
                'id' => 91,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":16463932,"PolNo":["MU-01-17-DA-000368","MU-01-17-DA-000368"],"ExpDate":["18 Sep 2020","18 Sep 2020"],"Requester":"+6312333213","RequestDate":"03 Sep 2020","RequestTime":"10:02:17"}}',
                'created_at' => '2020-09-03 10:02:17',
                'updated_at' => '2020-09-03 10:02:17',
                'ip_address' => '127.0.0.1',
            ),
            91 => 
            array (
                'id' => 92,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassMsg":{"ErrMsg":["ERROR !!, +6312333213 had registered the policy","ERROR !!, +6312333213 had registered the policy"]},"PassErr":"1","PassOut":{"PolNo":[],"ExpDate":[],"SubmitDate":"03 Sep 2020","CheckSum":"26664831","InsuredName":[],"ReplyRequester":"+6312333213","EffDate":[],"TowInd":[],"ReplyDate":"","PlateNo":[],"ReplyTime":""}}',
                'created_at' => '2020-09-03 10:02:18',
                'updated_at' => '2020-09-03 10:02:18',
                'ip_address' => '127.0.0.1',
            ),
            92 => 
            array (
                'id' => 93,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":12625970,"PolNo":["MK-01-18-TS-000484"],"ExpDate":["31 Aug 2021"],"Requester":"11","RequestDate":"03 Sep 2020","RequestTime":"10:15:44"}}',
                'created_at' => '2020-09-03 10:15:44',
                'updated_at' => '2020-09-03 10:15:44',
                'ip_address' => '127.0.0.1',
            ),
            93 => 
            array (
                'id' => 94,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassErr":"0","PassOut":{"PolNo":["MK-01-18-TS-000484"],"ExpDate":["31 AUG 2021"],"SubmitDate":"03 Sep 2020","CheckSum":"16867928","InsuredName":["VASQUEZ, ROWENA TALABINO"],"ReplyRequester":"11","EffDate":["31 AUG 2018"],"TowInd":["Y"],"ReplyDate":"03 SEP 2020","PlateNo":["A7W143"],"ReplyTime":"10:15:34"}}',
                'created_at' => '2020-09-03 10:15:44',
                'updated_at' => '2020-09-03 10:15:44',
                'ip_address' => '127.0.0.1',
            ),
            94 => 
            array (
                'id' => 95,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":12625970,"PolNo":["MK-01-18-TS-000484"],"ExpDate":["31 Aug 2021"],"Requester":"11","RequestDate":"03 Sep 2020","RequestTime":"10:18:04"}}',
                'created_at' => '2020-09-03 10:18:04',
                'updated_at' => '2020-09-03 10:18:04',
                'ip_address' => '127.0.0.1',
            ),
            95 => 
            array (
                'id' => 96,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassMsg":{"ErrMsg":["ERROR !!, 11 had registered the policy"]},"PassErr":"1","PassOut":{"PolNo":[],"ExpDate":[],"SubmitDate":"03 Sep 2020","CheckSum":"25755840","InsuredName":[],"ReplyRequester":"11","EffDate":[],"TowInd":[],"ReplyDate":"","PlateNo":[],"ReplyTime":""}}',
                'created_at' => '2020-09-03 10:18:04',
                'updated_at' => '2020-09-03 10:18:04',
                'ip_address' => '127.0.0.1',
            ),
            96 => 
            array (
                'id' => 97,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":13534961,"PolNo":"MK-01-18-TS-000484","LossDate":"03 Sep 2020","Requester":"+6312333213","RequestDate":"03 Sep 2020","RequestTime":"10:19:11"}}',
                'created_at' => '2020-09-03 10:19:11',
                'updated_at' => '2020-09-03 10:19:11',
                'ip_address' => '127.0.0.1',
            ),
            97 => 
            array (
                'id' => 98,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMREGVER.SUB',
                'api_data' => '{"PassMsg":"","PassErr":"0","PassOut":{"SubmitDate":"03 Sep 2020","CheckSum":"7172024","ReplyRequester":"+6312333213","ReplyDate":"03 SEP 2020","ReplyTime":"10:19:02"}}',
                'created_at' => '2020-09-03 10:19:13',
                'updated_at' => '2020-09-03 10:19:13',
                'ip_address' => '127.0.0.1',
            ),
            98 => 
            array (
                'id' => 99,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMPOLREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":15251944,"PolNo":"MK-01-18-TS-000484","LossDate":"03 Sep 2020","Email":"jiabin.siew@volservers.com","RequestDate":"03 Sep 2020","RequestTime":"10:21:59","Requester":"11"}}',
                'created_at' => '2020-09-03 10:21:59',
                'updated_at' => '2020-09-03 10:21:59',
                'ip_address' => '127.0.0.1',
            ),
            99 => 
            array (
                'id' => 100,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMPOLREG.SUB',
                'api_data' => '{"PassMsg":"ERROR !! Cant open file [AGENT.MAST]","PassErr":"1"}',
                'created_at' => '2020-09-03 10:22:00',
                'updated_at' => '2020-09-03 10:22:00',
                'ip_address' => '127.0.0.1',
            ),
            100 => 
            array (
                'id' => 101,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":15554941,"PolNo":["MK-01-18-TS-000484","ML-01-17-ML-003013"],"ExpDate":["31 Aug 2021","20 Nov 2020"],"Requester":"11","RequestDate":"03 Sep 2020","RequestTime":"10:24:33"}}',
                'created_at' => '2020-09-03 10:24:33',
                'updated_at' => '2020-09-03 10:24:33',
                'ip_address' => '127.0.0.1',
            ),
            101 => 
            array (
                'id' => 102,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassMsg":{"ErrMsg":["ERROR !!, 11 had registered the policy"]},"PassErr":"1","PassOut":{"PolNo":["ML-01-17-ML-003013"],"ExpDate":["20 NOV 2020"],"SubmitDate":"03 Sep 2020","CheckSum":"16261934","InsuredName":["MS. CHARLENE D. CHING"],"ReplyRequester":"11","EffDate":["20 NOV 2017"],"TowInd":["Y"],"ReplyDate":"03 SEP 2020","PlateNo":["TBA"],"ReplyTime":"10:24:24"}}',
                'created_at' => '2020-09-03 10:24:33',
                'updated_at' => '2020-09-03 10:24:33',
                'ip_address' => '127.0.0.1',
            ),
            102 => 
            array (
                'id' => 103,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":15554941,"PolNo":["MK-01-18-TS-000484","ML-01-17-ML-003013"],"ExpDate":["31 Aug 2021","20 Nov 2020"],"Requester":"11","RequestDate":"03 Sep 2020","RequestTime":"10:26:56"}}',
                'created_at' => '2020-09-03 10:26:56',
                'updated_at' => '2020-09-03 10:26:56',
                'ip_address' => '127.0.0.1',
            ),
            103 => 
            array (
                'id' => 104,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassMsg":{"ErrMsg":["ERROR !!, 11 had registered the policy","ERROR !!, 11 had registered the policy"]},"PassErr":"1","PassOut":{"PolNo":[],"ExpDate":[],"SubmitDate":"03 Sep 2020","CheckSum":"25755840","InsuredName":[],"ReplyRequester":"11","EffDate":[],"TowInd":[],"ReplyDate":"","PlateNo":[],"ReplyTime":""}}',
                'created_at' => '2020-09-03 10:26:56',
                'updated_at' => '2020-09-03 10:26:56',
                'ip_address' => '127.0.0.1',
            ),
            104 => 
            array (
                'id' => 105,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":15554941,"PolNo":["MK-01-18-TS-000484","ML-01-17-ML-003013"],"ExpDate":["31 Aug 2021","20 Nov 2020"],"Requester":"11","RequestDate":"03 Sep 2020","RequestTime":"10:27:18"}}',
                'created_at' => '2020-09-03 10:27:18',
                'updated_at' => '2020-09-03 10:27:18',
                'ip_address' => '127.0.0.1',
            ),
            105 => 
            array (
                'id' => 106,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassMsg":{"ErrMsg":["ERROR !!, 11 had registered the policy","ERROR !!, 11 had registered the policy"]},"PassErr":"1","PassOut":{"PolNo":[],"ExpDate":[],"SubmitDate":"03 Sep 2020","CheckSum":"25755840","InsuredName":[],"ReplyRequester":"11","EffDate":[],"TowInd":[],"ReplyDate":"","PlateNo":[],"ReplyTime":""}}',
                'created_at' => '2020-09-03 10:27:19',
                'updated_at' => '2020-09-03 10:27:19',
                'ip_address' => '127.0.0.1',
            ),
            106 => 
            array (
                'id' => 107,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMPOLREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":15251944,"PolNo":"MK-01-18-TS-000484","LossDate":"03 Sep 2020","Email":"jiabin.siew@volservers.com","RequestDate":"03 Sep 2020","RequestTime":"10:31:07","Requester":"11"}}',
                'created_at' => '2020-09-03 10:31:07',
                'updated_at' => '2020-09-03 10:31:07',
                'ip_address' => '127.0.0.1',
            ),
            107 => 
            array (
                'id' => 108,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMPOLREG.SUB',
                'api_data' => '{"PassMsg":"","PassErr":"0","PassOut":{"PolNo":"MK-01-18-TS-000484","SubmitDate":"03 Sep 2020","CheckSum":"14039956","ClmStatus":"OPEN FILE","ReplyRequester":"10:31:07","ClaimNo":"MK1801030001","ReplyDate":"03 SEP 2020","PlateNo":"A7W143","LossDate":"03 SEP 2020","ReplyTime":"10:30:58"}}',
                'created_at' => '2020-09-03 10:31:09',
                'updated_at' => '2020-09-03 10:31:09',
                'ip_address' => '127.0.0.1',
            ),
            108 => 
            array (
                'id' => 109,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMPOLREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":15251944,"PolNo":"MK-01-18-TS-000484","LossDate":"03 Sep 2020","Email":"jiabin.siew@volservers.com","RequestDate":"03 Sep 2020","RequestTime":"10:36:26","Requester":"11"}}',
                'created_at' => '2020-09-03 10:36:26',
                'updated_at' => '2020-09-03 10:36:26',
                'ip_address' => '127.0.0.1',
            ),
            109 => 
            array (
                'id' => 110,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMPOLREG.SUB',
                'api_data' => '{"PassMsg":"ERROR !! Duplicated Claim Master issued on the same date of loss : MK1801030001","PassErr":"1"}',
                'created_at' => '2020-09-03 10:36:27',
                'updated_at' => '2020-09-03 10:36:27',
                'ip_address' => '127.0.0.1',
            ),
            110 => 
            array (
                'id' => 111,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":15554941,"PolNo":["MK-01-18-TS-000484","ML-01-17-ML-003013"],"ExpDate":["31 Aug 2021","20 Nov 2020"],"Requester":"11","RequestDate":"03 Sep 2020","RequestTime":"10:37:19"}}',
                'created_at' => '2020-09-03 10:37:19',
                'updated_at' => '2020-09-03 10:37:19',
                'ip_address' => '127.0.0.1',
            ),
            111 => 
            array (
                'id' => 112,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassErr":"0","PassOut":{"PolNo":["MK-01-18-TS-000484","ML-01-17-ML-003013"],"ExpDate":["31 AUG 2021","20 NOV 2020"],"SubmitDate":"03 Sep 2020","CheckSum":"23432863","InsuredName":["VASQUEZ, ROWENA TALABINO","MS. CHARLENE D. CHING"],"ReplyRequester":"11","EffDate":["31 AUG 2018","20 NOV 2017"],"TowInd":["Y","Y"],"ReplyDate":"03 SEP 2020","PlateNo":["A7W143","TBA"],"ReplyTime":"10:37:11"}}',
                'created_at' => '2020-09-03 10:37:21',
                'updated_at' => '2020-09-03 10:37:21',
                'ip_address' => '127.0.0.1',
            ),
            112 => 
            array (
                'id' => 113,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":15554941,"PolNo":["MK-01-18-TS-000484","ML-01-17-ML-003013"],"ExpDate":["31 Aug 2021","20 Nov 2020"],"Requester":"11","RequestDate":"03 Sep 2020","RequestTime":"10:37:30"}}',
                'created_at' => '2020-09-03 10:37:30',
                'updated_at' => '2020-09-03 10:37:30',
                'ip_address' => '127.0.0.1',
            ),
            113 => 
            array (
                'id' => 114,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassMsg":{"ErrMsg":["ERROR !!, 11 had registered the policy","ERROR !!, 11 had registered the policy"]},"PassErr":"1","PassOut":{"PolNo":[],"ExpDate":[],"SubmitDate":"03 Sep 2020","CheckSum":"25755840","InsuredName":[],"ReplyRequester":"11","EffDate":[],"TowInd":[],"ReplyDate":"","PlateNo":[],"ReplyTime":""}}',
                'created_at' => '2020-09-03 10:37:30',
                'updated_at' => '2020-09-03 10:37:30',
                'ip_address' => '127.0.0.1',
            ),
            114 => 
            array (
                'id' => 115,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMPOLREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":15251944,"PolNo":"MK-01-18-TS-000484","LossDate":"03 Sep 2020","Email":"jiabin.siew@volservers.com","RequestDate":"03 Sep 2020","RequestTime":"10:37:35","Requester":"11"}}',
                'created_at' => '2020-09-03 10:37:35',
                'updated_at' => '2020-09-03 10:37:35',
                'ip_address' => '127.0.0.1',
            ),
            115 => 
            array (
                'id' => 116,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMPOLREG.SUB',
                'api_data' => '{"PassMsg":"ERROR !! Duplicated Claim Master issued on the same date of loss : MK1801030001","PassErr":"1"}',
                'created_at' => '2020-09-03 10:37:36',
                'updated_at' => '2020-09-03 10:37:36',
                'ip_address' => '127.0.0.1',
            ),
            116 => 
            array (
                'id' => 117,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":15554941,"PolNo":["MK-01-18-TS-000484","ML-01-17-ML-003013"],"ExpDate":["31 Aug 2021","20 Nov 2020"],"Requester":"11","RequestDate":"03 Sep 2020","RequestTime":"10:38:06"}}',
                'created_at' => '2020-09-03 10:38:06',
                'updated_at' => '2020-09-03 10:38:06',
                'ip_address' => '127.0.0.1',
            ),
            117 => 
            array (
                'id' => 118,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassMsg":{"ErrMsg":["ERROR !!, 11 had registered the policy","ERROR !!, 11 had registered the policy"]},"PassErr":"1","PassOut":{"PolNo":[],"ExpDate":[],"SubmitDate":"03 Sep 2020","CheckSum":"25755840","InsuredName":[],"ReplyRequester":"11","EffDate":[],"TowInd":[],"ReplyDate":"","PlateNo":[],"ReplyTime":""}}',
                'created_at' => '2020-09-03 10:38:07',
                'updated_at' => '2020-09-03 10:38:07',
                'ip_address' => '127.0.0.1',
            ),
            118 => 
            array (
                'id' => 119,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMPOLREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":15251944,"PolNo":"MK-01-18-TS-000484","LossDate":"02 Sep 2020","Email":"jiabin.siew@volservers.com","RequestDate":"03 Sep 2020","RequestTime":"10:39:20","Requester":"11"}}',
                'created_at' => '2020-09-03 10:39:20',
                'updated_at' => '2020-09-03 10:39:20',
                'ip_address' => '127.0.0.1',
            ),
            119 => 
            array (
                'id' => 120,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMPOLREG.SUB',
                'api_data' => '{"PassMsg":"","PassErr":"0","PassOut":{"PolNo":"MK-01-18-TS-000484","SubmitDate":"03 Sep 2020","CheckSum":"14039956","ClmStatus":"OPEN FILE","ReplyRequester":"10:39:20","ClaimNo":"MK1801030002","ReplyDate":"03 SEP 2020","PlateNo":"A7W143","LossDate":"02 SEP 2020","ReplyTime":"10:39:11"}}',
                'created_at' => '2020-09-03 10:39:22',
                'updated_at' => '2020-09-03 10:39:22',
                'ip_address' => '127.0.0.1',
            ),
            120 => 
            array (
                'id' => 121,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMPOLREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":15251944,"PolNo":"MK-01-18-TS-000484","LossDate":"01 Sep 2020","Email":"jiabin.siew@volservers.com","RequestDate":"03 Sep 2020","RequestTime":"10:40:46","Requester":"11"}}',
                'created_at' => '2020-09-03 10:40:46',
                'updated_at' => '2020-09-03 10:40:46',
                'ip_address' => '127.0.0.1',
            ),
            121 => 
            array (
                'id' => 122,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMPOLREG.SUB',
                'api_data' => '{"PassMsg":"","PassErr":"0","PassOut":{"PolNo":"MK-01-18-TS-000484","SubmitDate":"03 Sep 2020","CheckSum":"14039956","ClmStatus":"OPEN FILE","ReplyRequester":"10:40:46","ClaimNo":"MK1801030003","ReplyDate":"03 SEP 2020","PlateNo":"A7W143","LossDate":"01 SEP 2020","ReplyTime":"10:40:37"}}',
                'created_at' => '2020-09-03 10:40:47',
                'updated_at' => '2020-09-03 10:40:47',
                'ip_address' => '127.0.0.1',
            ),
            122 => 
            array (
                'id' => 123,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":16362933,"PolNo":["MK-01-18-TS-000484","ML-01-17-ML-003013"],"ExpDate":["31 Aug 2021","20 Nov 2020"],"Requester":"0163632233","RequestDate":"03 Sep 2020","RequestTime":"10:42:34"}}',
                'created_at' => '2020-09-03 10:42:34',
                'updated_at' => '2020-09-03 10:42:34',
                'ip_address' => '127.0.0.1',
            ),
            123 => 
            array (
                'id' => 124,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassMsg":{"ErrMsg":["ERROR !!, 11 had registered the policy","ERROR !!, 11 had registered the policy"]},"PassErr":"1","PassOut":{"PolNo":[],"ExpDate":[],"SubmitDate":"03 Sep 2020","CheckSum":"26563832","InsuredName":[],"ReplyRequester":"0163632233","EffDate":[],"TowInd":[],"ReplyDate":"","PlateNo":[],"ReplyTime":""}}',
                'created_at' => '2020-09-03 10:42:35',
                'updated_at' => '2020-09-03 10:42:35',
                'ip_address' => '127.0.0.1',
            ),
            124 => 
            array (
                'id' => 125,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":13433962,"PolNo":["MR-01-17-MR-000371"],"ExpDate":["14 Nov 2021"],"Requester":"0163632233","RequestDate":"03 Sep 2020","RequestTime":"10:45:31"}}',
                'created_at' => '2020-09-03 10:45:31',
                'updated_at' => '2020-09-03 10:45:31',
                'ip_address' => '127.0.0.1',
            ),
            125 => 
            array (
                'id' => 126,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassErr":"0","PassOut":{"PolNo":["MR-01-17-MR-000371"],"ExpDate":["14 NOV 2021"],"SubmitDate":"03 Sep 2020","CheckSum":"18382913","InsuredName":["STRONGHOLD INSURANCE CO., INC."],"ReplyRequester":"0163632233","EffDate":["14 NOV 2017"],"TowInd":["Y"],"ReplyDate":"03 SEP 2020","PlateNo":["BOW-165"],"ReplyTime":"10:45:22"}}',
                'created_at' => '2020-09-03 10:45:31',
                'updated_at' => '2020-09-03 10:45:31',
                'ip_address' => '127.0.0.1',
            ),
            126 => 
            array (
                'id' => 127,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":13433962,"PolNo":["MR-01-17-MR-000371"],"ExpDate":["14 Nov 2021"],"Requester":"0163632233","RequestDate":"03 Sep 2020","RequestTime":"10:45:39"}}',
                'created_at' => '2020-09-03 10:45:39',
                'updated_at' => '2020-09-03 10:45:39',
                'ip_address' => '127.0.0.1',
            ),
            127 => 
            array (
                'id' => 128,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassMsg":{"ErrMsg":["ERROR !!, 0163632233 had registered the policy"]},"PassErr":"1","PassOut":{"PolNo":[],"ExpDate":[],"SubmitDate":"03 Sep 2020","CheckSum":"26563832","InsuredName":[],"ReplyRequester":"0163632233","EffDate":[],"TowInd":[],"ReplyDate":"","PlateNo":[],"ReplyTime":""}}',
                'created_at' => '2020-09-03 10:45:39',
                'updated_at' => '2020-09-03 10:45:39',
                'ip_address' => '127.0.0.1',
            ),
            128 => 
            array (
                'id' => 129,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":13433962,"PolNo":["MN-01-15-DG-002222"],"ExpDate":["10 Dec 2018"],"Requester":"0163632233","RequestDate":"03 Sep 2020","RequestTime":"10:46:56"}}',
                'created_at' => '2020-09-03 10:46:56',
                'updated_at' => '2020-09-03 10:46:56',
                'ip_address' => '127.0.0.1',
            ),
            129 => 
            array (
                'id' => 130,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassMsg":{"ErrMsg":["ERROR !! Input Expired Date [MN-01-15-DG-002222] for validation failed"]},"PassErr":"1","PassOut":{"PolNo":[],"ExpDate":[],"SubmitDate":"03 Sep 2020","CheckSum":"26563832","InsuredName":[],"ReplyRequester":"0163632233","EffDate":[],"TowInd":[],"ReplyDate":"","PlateNo":[],"ReplyTime":""}}',
                'created_at' => '2020-09-03 10:46:56',
                'updated_at' => '2020-09-03 10:46:56',
                'ip_address' => '127.0.0.1',
            ),
            130 => 
            array (
                'id' => 131,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":13433962,"PolNo":["ML-01-17-ML-002511"],"ExpDate":["11 Sep 2020"],"Requester":"0163632233","RequestDate":"03 Sep 2020","RequestTime":"10:47:38"}}',
                'created_at' => '2020-09-03 10:47:38',
                'updated_at' => '2020-09-03 10:47:38',
                'ip_address' => '127.0.0.1',
            ),
            131 => 
            array (
                'id' => 132,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassErr":"0","PassOut":{"PolNo":["ML-01-17-ML-002511"],"ExpDate":["11 SEP 2020"],"SubmitDate":"03 Sep 2020","CheckSum":"18382913","InsuredName":["ROADWISE LOGISTICS CORPORATION"],"ReplyRequester":"0163632233","EffDate":["11 SEP 2017"],"TowInd":["Y"],"ReplyDate":"03 SEP 2020","PlateNo":["B0-T768"],"ReplyTime":"10:47:29"}}',
                'created_at' => '2020-09-03 10:47:39',
                'updated_at' => '2020-09-03 10:47:39',
                'ip_address' => '127.0.0.1',
            ),
            132 => 
            array (
                'id' => 133,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":13433962,"PolNo":["ML-01-17-ML-002513"],"ExpDate":["11 Sep 2020"],"Requester":"0163632233","RequestDate":"03 Sep 2020","RequestTime":"10:52:10"}}',
                'created_at' => '2020-09-03 10:52:10',
                'updated_at' => '2020-09-03 10:52:10',
                'ip_address' => '127.0.0.1',
            ),
            133 => 
            array (
                'id' => 134,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassErr":"0","PassOut":{"PolNo":["ML-01-17-ML-002513"],"ExpDate":["11 SEP 2020"],"SubmitDate":"03 Sep 2020","CheckSum":"18382913","InsuredName":["ROADWISE LOGISTICS CORPORATION"],"ReplyRequester":"0163632233","EffDate":["11 SEP 2017"],"TowInd":["Y"],"ReplyDate":"03 SEP 2020","PlateNo":["BO-X260"],"ReplyTime":"10:52:01"}}',
                'created_at' => '2020-09-03 10:52:11',
                'updated_at' => '2020-09-03 10:52:11',
                'ip_address' => '127.0.0.1',
            ),
            134 => 
            array (
                'id' => 135,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":13433962,"PolNo":["ML-01-17-ML-002510"],"ExpDate":["11 Sep 2020"],"Requester":"0163632233","RequestDate":"03 Sep 2020","RequestTime":"10:54:50"}}',
                'created_at' => '2020-09-03 10:54:50',
                'updated_at' => '2020-09-03 10:54:50',
                'ip_address' => '127.0.0.1',
            ),
            135 => 
            array (
                'id' => 136,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassErr":"0","PassOut":{"PolNo":["ML-01-17-ML-002510"],"ExpDate":["11 SEP 2020"],"SubmitDate":"03 Sep 2020","CheckSum":"18382913","InsuredName":["ROADWISE LOGISTICS CORPORATION"],"ReplyRequester":"0163632233","EffDate":["11 SEP 2017"],"TowInd":["Y"],"ReplyDate":"03 SEP 2020","PlateNo":["BO-R982"],"ReplyTime":"10:54:41"}}',
                'created_at' => '2020-09-03 10:54:50',
                'updated_at' => '2020-09-03 10:54:50',
                'ip_address' => '127.0.0.1',
            ),
            136 => 
            array (
                'id' => 137,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":13433962,"PolNo":["ML-01-17-ML-002512"],"ExpDate":["11 Sep 2020"],"Requester":"0163632233","RequestDate":"03 Sep 2020","RequestTime":"10:55:47"}}',
                'created_at' => '2020-09-03 10:55:47',
                'updated_at' => '2020-09-03 10:55:47',
                'ip_address' => '127.0.0.1',
            ),
            137 => 
            array (
                'id' => 138,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassErr":"0","PassOut":{"PolNo":["ML-01-17-ML-002512"],"ExpDate":["11 SEP 2020"],"SubmitDate":"03 Sep 2020","CheckSum":"18382913","InsuredName":["ROADWISE LOGISTICS CORPORATION"],"ReplyRequester":"0163632233","EffDate":["11 SEP 2017"],"TowInd":["Y"],"ReplyDate":"03 SEP 2020","PlateNo":["BO-X251"],"ReplyTime":"10:55:38"}}',
                'created_at' => '2020-09-03 10:55:47',
                'updated_at' => '2020-09-03 10:55:47',
                'ip_address' => '127.0.0.1',
            ),
            138 => 
            array (
                'id' => 139,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":13433962,"PolNo":["ML-01-17-ML-002509"],"ExpDate":["11 Sep 2020"],"Requester":"0163632233","RequestDate":"03 Sep 2020","RequestTime":"10:56:53"}}',
                'created_at' => '2020-09-03 10:56:53',
                'updated_at' => '2020-09-03 10:56:53',
                'ip_address' => '127.0.0.1',
            ),
            139 => 
            array (
                'id' => 140,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.POLREGVER.SUB',
                'api_data' => '{"PassErr":"0","PassOut":{"PolNo":["ML-01-17-ML-002509"],"ExpDate":["11 SEP 2020"],"SubmitDate":"03 Sep 2020","CheckSum":"18382913","InsuredName":["ROADWISE LOGISTICS CORPORATION"],"ReplyRequester":"0163632233","EffDate":["11 SEP 2017"],"TowInd":["Y"],"ReplyDate":"03 SEP 2020","PlateNo":["BO-T823"],"ReplyTime":"10:56:40"}}',
                'created_at' => '2020-09-03 10:56:53',
                'updated_at' => '2020-09-03 10:56:53',
                'ip_address' => '127.0.0.1',
            ),
            140 => 
            array (
                'id' => 141,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMPOLREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":16059936,"PolNo":"MK-01-18-TS-000484","LossDate":"01 Sep 2020","Email":"jiabin.siew@volservers.com","RequestDate":"03 Sep 2020","RequestTime":"02:49:12","Requester":"0163632233"}}',
                'created_at' => '2020-09-03 14:49:12',
                'updated_at' => '2020-09-03 14:49:12',
                'ip_address' => '127.0.0.1',
            ),
            141 => 
            array (
                'id' => 142,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMPOLREG.SUB',
                'api_data' => '{"PassMsg":"ERROR !! Duplicated Claim Master issued on the same date of loss : MK1801030003","PassErr":"1"}',
                'created_at' => '2020-09-03 14:49:13',
                'updated_at' => '2020-09-03 14:49:13',
                'ip_address' => '127.0.0.1',
            ),
            142 => 
            array (
                'id' => 143,
                'action' => 'SENT',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMPOLREG.SUB',
                'api_data' => '{"PassIn":{"SubmitDate":"03 Sep 2020","CheckSum":16059936,"PolNo":"MK-01-18-TS-000484","LossDate":"31 Aug 2020","Email":"jiabin.siew@volservers.com","RequestDate":"03 Sep 2020","RequestTime":"02:49:32","Requester":"0163632233"}}',
                'created_at' => '2020-09-03 14:49:32',
                'updated_at' => '2020-09-03 14:49:32',
                'ip_address' => '127.0.0.1',
            ),
            143 => 
            array (
                'id' => 144,
                'action' => 'RETURN',
                'link' => 'http://42.1.62.98:9193/PHP_GEN/subroutine/PHP.AM.CLMPOLREG.SUB',
                'api_data' => '{"PassMsg":"","PassErr":"0","PassOut":{"PolNo":"MK-01-18-TS-000484","SubmitDate":"03 Sep 2020","CheckSum":"14241954","ClmStatus":"OPEN FILE","ReplyRequester":"0163632233","ClaimNo":"MK1801030004","ReplyDate":"03 SEP 2020","PlateNo":"A7W143","LossDate":"31 AUG 2020","ReplyTime":"14:49:19"}}',
                'created_at' => '2020-09-03 14:49:34',
                'updated_at' => '2020-09-03 14:49:34',
                'ip_address' => '127.0.0.1',
            ),
            144 => 
            array (
                'id' => 145,
                'action' => 'Receive Request',
                'link' => 'update_cnc_status',
                'api_data' => '{"CncNo":"CNC18000028","SubmitDate":"28 Aug 2020","CheckSum":"1718153","Status":"P","FilePath":"123","Message":"123","RequestDate":"28 AUG 2020","RequestTime":"12:09:29"}',
                'created_at' => '2020-09-07 02:27:02',
                'updated_at' => '2020-09-07 02:27:02',
                'ip_address' => NULL,
            ),
            145 => 
            array (
                'id' => 146,
                'action' => 'Receive Request',
                'link' => 'update_cnc_status',
                'api_data' => '{"CncNo":"CNC18000028","SubmitDate":"28 Aug 2020","CheckSum":"1718153","Status":"P","FilePath":"123","Message":"123","RequestDate":"28 AUG 2020","RequestTime":"12:09:29"}',
                'created_at' => '2020-09-07 02:27:46',
                'updated_at' => '2020-09-07 02:27:46',
                'ip_address' => NULL,
            ),
            146 => 
            array (
                'id' => 147,
                'action' => 'Receive Request',
                'link' => 'update_cnc_status',
                'api_data' => '{"CncNo":"CNC18000028","SubmitDate":"07 SEP 2020","CheckSum":"1718074","Status":"P","FilePath":"123","Message":"123","RequestDate":"07 SEP 2020","RequestTime":"12:09:29"}',
                'created_at' => '2020-09-07 02:28:34',
                'updated_at' => '2020-09-07 02:28:34',
                'ip_address' => NULL,
            ),
            147 => 
            array (
                'id' => 148,
                'action' => 'Receive Request',
                'link' => 'update_cnc_status',
                'api_data' => '{"CncNo":"CNC18000025","SubmitDate":"07 SEP 2020","CheckSum":"1718074","Status":"P","FilePath":"123","Message":"123","RequestDate":"07 SEP 2020","RequestTime":"12:09:29"}',
                'created_at' => '2020-09-07 02:28:53',
                'updated_at' => '2020-09-07 02:28:53',
                'ip_address' => NULL,
            ),
        ));
        
        
    }
}