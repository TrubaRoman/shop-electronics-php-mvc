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
    /**
     * 
     * @param type $id
     * add product to cart  add  to $_SESSION array($id = > countProducts)
      */
    public static function addProduct($id)
    {
        $id = intval($id);
        //Пустий масив для товарів в кошику
        $productsInCart = [];
        //Якшо є в кошику є товари(вони зберігаються в сесії)
        if(isset($_SESSION['products'])){
            // ми зберігаємо товари в кошик
            $productsInCart = $_SESSION['products'];
        }
        // якшо id добавляющого товару існує, 
        if(array_key_exists($id, $productsInCart))
        {           //то ми в масиві плюсуємо товар під даний id
            $productsInCart[$id]++; 
        }//якщо нема даного товару
        else{
            //то ми створюємо новий товар як 1
            $productsInCart[$id]= 1;
        }
        // записуємо в сесію
        $_SESSION['products'] = $productsInCart;
        // повертаємо кількість елементів в кошику
       return self::countItem();

    }
    
    /**
     * Підрахунок товарів в кошику
     * @return int
     * 
     */
    public static function countItem()
    {
        if(isset($_SESSION['products'])){
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity){
                $count = $count + $quantity;
            }
            return $count;
        }
        else {
            return  0;
        }
    }
    
    public static function clearCart()
    {
        unset($_SESSION['products']);
    }
}
