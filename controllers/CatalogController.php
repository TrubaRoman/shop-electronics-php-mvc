<?php
require_once ROOT.'/models/Product.php';
require_once ROOT.'/models/Category.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CatalogController
 *
 * @author r_truba
 */
class CatalogController
{
    public function actionIndex()
    {
        $categoryList = [];
        $categoryList = Category::getCategoryList();
        $catalogList = [];
        $catalogList = Product::getLatesProducts(6);
        
        require_once ROOT.'/views/catalog/index.php';
        return true;
    }
    
    public function actionCategory($categoryId)
    {
        $categoryList = [];
        $categoryList = Category::getCategoryList();
        
        $categoryProducts = [];
        $categoryProducts = Product::getProductsListByCategory($categoryId);
        
        require_once ROOT.'/views/catalog/category.php';
        return true;
    }
}
