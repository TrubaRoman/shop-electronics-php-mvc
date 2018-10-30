<?php
require_once ROOT.'/models/Category.php';

//require_once ROOT.'/controllers/GlobalController.php';
//namespace \controllers;
/**
 * Description of SiteController
 *
 * @author r_truba
 */
class SiteController 
{
   
    
   
    public function actionIndex()
    {
        $categoryList = Category::getCategoryList();
        require_once ROOT.'/views/site/index.php';
        return true;
    }
    
}
