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
    public function sendPasswordRepair($linkarray,$email,$time)
    {
        if(is_array($linkarray)&& is_numeric($time)){
            $http = $linkarray[0];
            $link = $http.$linkarray[1];
            $date = date('Y-m-d H:i:s',$time);
            $from = $this->conf['adminEmail'];
            $to = $email;
            $subject = 'Відновлення пароля';
            $headers = $this->conf['mailHeaders'].$this->conf['headers'];
            $tpl = $this->tpldir.'repair.eml';
            $mail = file_get_contents($tpl);
                      
            $body = strtr($mail, [
                '{http}'=> $http,
                '{link}' => $link,
                '{time}' => $date
            ]);

            return $this->sendMail($from, $to, $subject, $body);
                        
        }
    }
}
