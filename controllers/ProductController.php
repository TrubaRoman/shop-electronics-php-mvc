<?php

//require_once ROOT.'/controllers/GlobalController.php';


/**
 * Description of ProductController 
 * 
 *
 * @author r_truba
 */
class ProductController  extends GlobalController
{
    /**
     * action views product item decription
     * @param type $id
     * @return boolean
     */
    public function actionView($id)
    {
        $cartList = parent::getCart();
        //$categoryList = Category::getCategoryList();
        $prodctItem = Product::getProductById($id);
        $specificationsProduct = Specifications::getSpetificByIdProduct($id);
        $recommendedProduct = Product::getRecomendedProducts(4);
        require_once(ROOT.'/views/product/view.php');
        return true;
    }
}
