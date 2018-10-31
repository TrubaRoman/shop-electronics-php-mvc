<?php


/**
 * Description of CatalogController
 *
 * @author r_truba
 */

/**
 * controller catalog products
 */
class CatalogController 
{
    /**
     * 
     * @param type $page
     * @return boolean
     */
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
    
    /**
     * 
     * @param type $categoryId
     * @param type $page
     * @return boolean
     */
    
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
