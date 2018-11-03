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
        require_once(ROOT.'/views/contacts/index.php');
        return true;
    }
}
