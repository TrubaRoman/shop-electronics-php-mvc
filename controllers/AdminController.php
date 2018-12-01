<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminController
 *
 * @author r_truba
 */
class AdminController extends AdminBase

{
    
    public function __construct()
    {       
        self::checkAdmin();
    }

    public function actionIndex()
    {
              
      
        
        require_once ROOT.'/views/admin/index.php'; 





    }
}
