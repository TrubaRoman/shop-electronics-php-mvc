<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CartController
 *
 * @author r_truba
 */
class CartController
{
    public function actionAdd($id)
    {
        Cart::addProduct($id);
        
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location:$referrer");
    }
    
    public function actionAddAjax($id)
    {
       echo Cart::addProduct($id);
        return TRUE;
    }
    
}
