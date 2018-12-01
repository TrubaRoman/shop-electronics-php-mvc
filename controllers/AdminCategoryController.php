<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminCategoryController
 *
 * @author r_truba
 */
class AdminCategoryController extends AdminBase
{
      public function __construct()
    {
        self::checkAdmin();
    }
    
    public function actionIndex()
    {    
        return true;
    }
    
    public function actionCreate()
    {
        return true;
    }
    
    public function actionUpdate($id)
    {
        return true;
    }
    
    public function actionDelete($id)
    {
        return true;
    }        
}
