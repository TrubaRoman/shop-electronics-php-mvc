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
    protected $conf;
    protected $tpldir;


    public function __construct()
    {
       $confPach = ROOT.'/config/site_params.php';
       $this->conf = require_once $confPach;
       $this->tpldir = ROOT.$this->conf['tpl'];
       
    }

    protected function sendMail($from = null,$to = null,$subject = null,$message = null)
    {
      $from =  ($from)??$this->conf['adminEmail'];
      $to =  ($to)??$this->conf['adminEmail'];
      $subject =  ($subject)??'subject'.$this->conf['adminEmail'];
      $message =  ($message)?? date('Y-m-d h:m:s');
  
        $headers = $this->conf['mailHeaders']. $this->conf['headers'];  
  
        return mail($to, $subject, $message,$headers);

                
    }
   
  
}
