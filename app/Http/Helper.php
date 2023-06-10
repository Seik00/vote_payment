<?php
namespace App\Http;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use \Mailjet\Resources;
use Mailjet\LaravelMailjet\Facades\Mailjet;
use Auth;
use Lang;
use App\Models\AdminLog;
class Helper{
     public static function path_now($menu){
        $routername = Route::currentRouteName();
         $allmenu =config($menu);
        foreach($allmenu as $menu){
            foreach($menu['items'] as $submenu){
                if($routername==$submenu['router']){
                    
                    if(Lang::getLocale() == 'en'){
                      $allmenu['main_title']=$menu['name'];
                      $allmenu['sub_title']=$submenu['name'];
                    }else{
                      $allmenu['main_title']=$menu['name_cn'];
                      $allmenu['sub_title']=$submenu['name_cn'];
                    }
                   
                  break;
                }
            }
       }
       if(empty($allmenu['main_title'])||empty($allmenu['sub_title'])){
        $allmenu['main_title']='';
        $allmenu['sub_title']='';
       }
       return $allmenu;
    }

    public static function send_mail($email, $subject, $content){
       
        $mailjet = Mailjet::getClient();

        // Resources are all located in the Resources class
        $response = $mailjet->get(Resources::$Contact);
    
        $body = [
          'FromEmail' => "hello@digifiv.com",
          'FromName' => "PSR Team",
          'Subject' => $subject,
        
          'Html-part' => $content,
          'Recipients' => [['Email' => $email]]
        ];

        $response = $mailjet->post(Resources::$Email, ['body' => $body]);
        return ($response);
    }
    public static function add_log($act){
       $data['act']=$act;
       $data['ip_address']=\Request::ip();
       $data['user_id']=Auth::id();
       AdminLog::create($data);
    }

    public static function getDistanceBetweenPoints($lat1, $lon1, $lat2, $lon2) {
      $theta = $lon1 - $lon2;
      $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
      $miles = acos($miles);
      $miles = rad2deg($miles);
      $miles = $miles * 60 * 1.1515;
      $feet = $miles * 5280;
      $yards = $feet / 3;
      $kilometers = $miles * 1.609344;
      $meters = $kilometers * 1000;
      return compact('miles','feet','yards','kilometers','meters'); 
    }
}