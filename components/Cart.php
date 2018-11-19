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
        if (isset($_SESSION['products'])) {
            // ми зберігаємо товари в кошик
            $productsInCart = $_SESSION['products'];
        }
        // якшо id добавляющого товару існує, 
        if (array_key_exists($id, $productsInCart)) {           //то ми в масиві плюсуємо товар під даний id
            $productsInCart[$id] ++;
        }//якщо нема даного товару
        else {
            //то ми створюємо новий товар як 1
            $productsInCart[$id] = 1;
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
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }
    
    public static function countOneProducts($id)
    {
        if(isset($_SESSION['products']))
        {   
           return $_SESSION['products'][$id];
        }
    }

    public static function getProductsInCart()
    {
        if (isset($_SESSION['products']))
            return $_SESSION['products'];
        else
            return false;
    }
/**
 * clear cart all products
 */
    public static function clearCart()
    {   if(isset($_SESSION['products']))
        unset($_SESSION['products']);
    //header("Location: ".$_SERVER['HTTP_REFERER']);
    }
    
    public static function clearOneProducts($id_clear){
    
        if (isset($_SESSION['products'][$id_clear])){
            unset($_SESSION['products'][$id_clear]);
             header("Location: ".$_SERVER['HTTP_REFERER']);
        }
    }
            


    

    /**
     * * method Підраховує загальну кількість товарів
     * @param type $products
     * @return boolean
     */
    public static function getTotalPrice($products,$discount = true)
    {
        $total = 0;

        $productsInCart = self::getProductsInCart();
        if ($productsInCart) {
            foreach ($products as $item) {
                if($discount == true){
                    $discountproduct = (isset($item['discount'])) ? $item['discount'] : 0;
                }
 else {$discountproduct = 0;}
                $total += ($item['price'] - $discountproduct ) * $productsInCart[$item['id']];
            }

           
        } 
         return $total;
   
    }
/**
 * method Підраховує загальні знижки товарів
 * @param type $products
 * @return boolean
 */
    public static function getTotalDiscount($products)
    {
        $discount = 0;

        $productsInCart = self::getProductsInCart();
        if ($productsInCart) {
            foreach ($products as $item) {
                $discount += $item['discount'] * $productsInCart[$item['id']];
            }

           
        }
      return $discount;
    }
    
  
    

}
