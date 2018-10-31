<?php
require_once ROOT.'/models/Product.php';
require_once ROOT.'/models/Category.php';
require_once ROOT.'/components/Pagination.php';
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
    public function actionIndex($page = 1)
    {
        $categoryList = [];
        $categoryList = Category::getCategoryList();
        $catalogList = [];
        $catalogList = Product::getLatesProducts(6,$page);
        $total = Product::getTotalProductsInCategory();
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT,'page-');
        require_once ROOT.'/views/catalog/index.php';
        return true;
    }
    
    public function actionCategory($categoryId,$page = 1)
    {
        $categoryList = [];
        $categoryList = Category::getCategoryList();
        
        $categoryProducts = [];
        $categoryProducts = Product::getProductsListByCategory($categoryId,$page);
        $total = Product::getTotalProductsInCategory($categoryId);
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
        require_once ROOT.'/views/catalog/category.php';
        return true;
    }
}
