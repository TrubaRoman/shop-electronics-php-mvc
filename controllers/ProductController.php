<?php
require_once ROOT.'/models/Category.php';
require_once ROOT.'/models/Product.php';
require_once ROOT.'/models/Specifications.php';
//require_once ROOT.'/controllers/GlobalController.php';


/**
 * Description of ProductController
 *
 * @author r_truba
 */
class ProductController 
{
    public function actionView($id)
    {
        $categoryList = Category::getCategoryList();
        $prodctItem = Product::getProductById($id);
        $specificationsProduct = Specifications::getSpetificByIdProduct($id);
        $recommendedProduct = Product::getRecomendedProducts(4);
        require_once(ROOT.'/views/product/view.php');
        return true;
    }
}
