<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contactsMail
 *
 * @author r_truba
 */
class contactsMail extends Mailer
{
    public function sendContacts($email,$message,$name = '')
    {
        
      $subject = ($name !=='')? $name:'Повідомлення від гостя сайту';
      $eml = $this->tpldir.'contacts.eml';
      $tpl = file_get_contents($eml);
      $from = $email;
      $to = $this->conf['adminEmail'];
      $date = date('Y-m-d h:m');
      $mail = strtr($tpl,[
          '{email}' => $email,
          '{adminemail}' => $to,
          '{subject}' => $subject,
          '{Text}' => $message,
          '{date}' => $date,
          '{name}' => $name
      ]);
;
      return $this->sendMail($from, $to, $subject, $mail);
           
        
    }
            
    
}
