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

        if (!empty($_POST)) {

            $email = $_POST['email'];
            $message = $_POST['message'];

            if (!Validate::checkEmail($email))
                $errors[] = "Поле Email введино некорректно!";
            if (!Validate::checkMessage($message))
                $errors[] = "Занадто коротке повідомлення!";

            if ($errors == false) {
                $name = '';
                if (User::checkEmailExists($email)) {
                    $user = User::getUserByEmail($email);
                    $name = $user['name'];
                }

                $mailer = new contactsMail();
                $result = $mailer->sendContacts($email, $message, $name);

                if ($result == true) {
                    $success[] = 'Повідомлення успішно відправлено';
                }
                else{$errors[] = 'Невдалось відправити повідомлення';}
            }
        }
        require_once(ROOT . '/views/contacts/index.php');
        return true;
    }

}
