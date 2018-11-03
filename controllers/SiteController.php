<?php

/**
 * Description of SiteController
 *Home page controller
 * @author r_truba
 */
class SiteController 
{
   
    /**
     * View home-page
     * @return boolean
     */
   
    public function actionIndex()
    {
        //$categoryList = Category::getCategoryList();
        require_once ROOT.'/views/site/index.php';
        return true;
    }
    
}
