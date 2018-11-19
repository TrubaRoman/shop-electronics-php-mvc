<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mailer
 *
 * @author r_truba
 */
class Mailer
{
    private $conf;
    private $headers;


    public function __construct()
    {
       $confPatch = ROOT.'/config/site_params.php';
       $this->conf = require_once $confPatch;
        $headers = $this->conf['mailHeaders']."\r\n";
        $headers  .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-Type: text/html; charset=utf-8' . "\r\n";
    }

    public function sendEmailinUser($email,$message,$subject = false)
    {
        if($subject != false)
        {
            $subject = 'повідомлення від користувача: '.$subject.'.';
        }
        else {
            $subject = 'Повідомлення від незареєстрованого юзера';           
        }
        
        $adminEmail = $this->conf['adminEmail'];
        $message = '<h4>'.$message.'</h4></br> '
                . '<h4>повідомлення від: <span style = "color:green;" >'
                .$email.'</span></h4>';
        


        return mail($adminEmail, $subject, $message,$this->headers);
        
    }
  
}
