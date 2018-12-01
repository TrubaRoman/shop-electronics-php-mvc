<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminBase
 *
 * @author r_truba
 */
abstract class AdminBase
{
   // private static $countip;
    

    public function checkAdmin()
    {
        $ip = self::inputIp();
        self::banUser($ip);
     //   var_dump($ip);die;
        if(!Accesscontrol::checkIp($ip))
            {
                Accesscontrol::saveIp($ip) ;            
            }

        if(User::isGuest()) {
            Accesscontrol::countBlackAccess($ip, $user_id = 'guest','is guest access denied');
            die('access denie');   
        }
        $user_id = User::checkLogget();
        
       // Accesscontrol::saveIp($ip, $user_id);        
        $user = User::getUserbyIdAll($user_id);
      
        if($user['role'] == 'perec') return true;
    else {

            Accesscontrol::countBlackAccess($ip,$user_id, 'registered  user access denied'.$user['name']);
            die('Access denied');}
    }
    
    
    private static function inputIp(){
             
        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = @$_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP))
            return $client;
        elseif (filter_var($forward, FILTER_VALIDATE_IP))
            return $forward;
        else
            return $remote;
    }
    
    private static function banUser($ip){

        if(Accesscontrol::getCountBlackAccess($ip) > 4)
            Accesscontrol::ban($ip) ;
    }
}
