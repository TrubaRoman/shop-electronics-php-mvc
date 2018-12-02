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
        
        $categoryList = Category::getCategoryListAdmin();
        
 
        $errors = false;
        if(!empty($_POST)){
            $options['name'] = Validate::filterData($_POST['name']);
            $options['code'] = Validate::filterData($_POST['code']);
            $options['price'] = Validate::filterData($_POST['price']);
            $options['discount'] = Validate::filterData($_POST['discount']);
            $options['brand'] = Validate::filterData($_POST['brand']);
            $options['category_id'] = Validate::filterData($_POST['category_id']);
            $options['status'] = Validate::filterData($_POST['status']);
            $options['is_new'] = Validate::filterData($_POST['is_new']);
            $options['is_recommended'] = Validate::filterData($_POST['is_recommended']);
            $options['description'] = Validate::filterData($_POST['description']);
            
            if(!Validate::checkStrings($options['name']))$errors[] = 'Невірна довжина назви продукту';
            if(!is_numeric($options['code']))$errors[] = 'Код товару повинен містити тільки цифри';
            if(!is_numeric($options['price']))$errors[] = 'Ціна повинна складатися  тільки з цифер';
            if(!empty($options['discount']) && !is_numeric($options['discount']))$errors[] = 'Скидка на товар повинна складатися  тільки з цифер';
            if(!Validate::checkStrings($options['brand']))$errors[] = 'Невірна довжина бренду';
            
            if($errors == false){
                $id = Product::create($options);
                if($id){
                    header("Location:/backend/specification/create/{$id}");
                }
            }

        }
        require_once ROOT.'/views/admin/admin_products/create.php';
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
            
           if(Product::deleteProductInId($id) && Specifications::deleteSpecificByIdProduct($id))
           {
               header("Location:/backend/products/page-1");
           }
        } 
         require_once ROOT.'/views/admin/admin_products/delete.php';
        return true;
    }        
    
    
    
}
