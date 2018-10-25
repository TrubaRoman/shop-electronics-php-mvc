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
        $string = '11-12-2018';
        $pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';
        $replace = 'День: $1 Місяць: $2 Рік: $3';
        echo preg_replace($pattern, $replace, $string);
        return true;
    }
}
