<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContactsController
 *
 * @author r_truba
 */
class ContactsController
{
    
    public function actionIndex()
    {
        $email = '';
        $message = '';
        $errors = false;
        $subject = false;
        $result = false;
        $success = false;
        
        if(!empty($_POST)){

            $email = $_POST['email'];
            $message = $_POST['message'];
           
             if(!Validate::checkEmail($email)) $errors[] = "Поле Email введино некорректно!";
             if(!Validate::checkMessage($message)) $errors[] = "Занадто коротке повідомлення!";

             if ($errors == false) {

                if (User::checkEmailExists($email)) {
                    $user = User::getUserByEmail($email);
                   $subject = $user['name'];
                }
                
               $mailer = new Mailer();
              $result =  $mailer->sendEmailinUser($email, $message, $subject);

              $success[] = ($result = true)?'Повідомлення успішно відправлено':false;
              $result = true;
            }
        }
        require_once(ROOT.'/views/contacts/index.php');
        return true;
    }
}
