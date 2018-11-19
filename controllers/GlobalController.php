<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GlobalController
 *
 * @author r_truba
 */
class GlobalController
{

    
    public static function getCart()
    {
        $cartList = [];
        $products = 0;
                $productsInCart = false;
        $productsInCart = Cart::getProductsInCart();
      
        if($productsInCart){
          $cartList['productInCart'] = $productsInCart; 
        $productsIds = array_keys($productsInCart);
        $products = Product::getProductsByIds($productsIds);
        $cartList['products'] = $products;        
        }
        
        $cartList['totalPrice'] = Cart::getTotalPrice($products);
        $cartList['subTotalPrice'] = Cart::getTotalPrice($products,false);
        $cartList['totalDiscount'] = Cart::getTotalDiscount($products);
        
        return $cartList;
    }
    
    
    public static function cartClear()
    {
       return Cart::clearCart();
    }
    
    public static function clearItemCart($id)
            {
               return Cart::clearOneProducts($id);
              }
}
