<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductsController
 *
 * @author r_truba
 */
class ProductsController
{
    public function actionList()
    {
        echo "ProductController actionList";
        $string = '21-01-1983';
        $replace = 'Year $3, Month $2, Day $1';
        $pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';
        echo '<br/>';
        echo preg_replace($pattern, $replace, $string);
        return true;
    }
}
