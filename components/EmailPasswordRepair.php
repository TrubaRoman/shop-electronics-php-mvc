<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of emailPasswordRepair
 *
 * @author r_truba
 */
class EmailPasswordRepair extends Mailer

{
    public $link;

    public function __construct()
    {
        parent::__construct();
        $this->link = SELFADDRESS;
    }

    public function sendPasswordRepair($link_hash,$email,$time)
    {       
        if(is_string($link_hash)&& is_numeric($time)){
            $http = $this->link;
            $link = $http.$link_hash;
            $date = date('Y-m-d H:i:s',$time);
            $from = $this->conf['adminEmail'];
            $to = $email;
            $subject = 'Відновлення пароля';
            $headers = $this->conf['mailHeaders'].$this->conf['headers'];
            $tpl = $this->tpldir.'repair.eml';
            $mail = file_get_contents($tpl);
                      
            $body = strtr($mail,[
                "{http}" => $http,
                "{LINK_TIME}" => LINK_TIME,
                "{link}" => $link,
                "{time}" => $date
            ]);
            return $this->sendMail($from, $to, $subject, $body);
                        
        }
    }
}
