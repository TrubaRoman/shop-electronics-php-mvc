<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminProductsController
 *
 * @author r_truba
 */
class AdminProductsController extends AdminBase
{
     public function __construct()
    {
        self::checkAdmin();
    }
    
    public function actionIndex($page = 1)
    {    
        $productsList = Product::getLatesProducts(20, $page,'ASC');
            $total = Product::getTotalProductsInCategory();
            $pagination = new Pagination($total, $page, 20,'page-');
    require_once ROOT.'/views/admin/admin_products/index.php';
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
        $productitem = Product::getProductById($id);

        if(isset($_POST['delete']))
        {
           if(Product::deleteProductInId($id))
           {
               header("Location:/backend/products/page-1");
           }
        } 
         require_once ROOT.'/views/admin/admin_products/delete.php';
        return true;
    }        
    
    
}
