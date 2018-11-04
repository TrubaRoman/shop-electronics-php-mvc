<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cart
 *
 * @author r_truba
 */
class Cart
{
    public static function addProduct($id)
    {
        $id = intval($id);
        
        $products = [];
        
        if(isset($_SESSION['products'])){
            $products = $_SESSION['products'];
        }
    }
}
