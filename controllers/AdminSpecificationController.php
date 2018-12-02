<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminSpecificationController
 *
 * @author r_truba
 */
class AdminSpecificationController extends AdminBase
{

    public function actionIndex($id)
    {
        $product = Product::getProductById($id);

        $specificationlist = Specifications::getSpetificByIdProduct($id);
        require_once ROOT . '/views/admin/admin_specification_product/index.php';
        return true;
    }

    
    
    public function actionCreate($id)
    {
        $product = Product::getProductById($id);
          $errors = false;
        if(!empty($_POST)){
            $specification['product_id'] = Validate::filterData($id);
            $specification['diagonal'] = Validate::filterData($_POST['diagonal']);
            $specification['operating_system'] = Validate::filterData($_POST['operating_system']);
            $specification['processor'] = Validate::filterData($_POST['processor']);
            $specification['graphics'] = Validate::filterData($_POST['graphics']);
            $specification['memory'] = Validate::filterData($_POST['memory']);
            $specification['hard'] = Validate::filterData($_POST['hard']);
            $specification['wireless'] = Validate::filterData($_POST['wireless']);
            $specification['battery'] = Validate::filterData($_POST['battery']);
            $specification['additionally'] = Validate::filterData($_POST['additionally']);

            
           
            if(!Validate::checkStrings($specification['diagonal']))$errors[] = 'Невірно заповнені дані про монітор';
            if(!Validate::checkStrings($specification['operating_system']))$errors[] = 'Невірно заповнені дані про ОС';
            if(!Validate::checkStrings($specification['processor']))$errors[] = 'Невірно заповнені дані про Просесор';
            if(!Validate::checkStrings($specification['graphics']))$errors[] = 'Невірно заповнені дані про Відеокерту';
            if(!Validate::checkStrings($specification['memory']))$errors[] = 'Невірно заповнені дані про Оперативку';
            if(!Validate::checkStrings($specification['hard']))$errors[] = 'Невірно заповнені дані про Жорсткий диск';
            if(!Validate::checkStrings($specification['battery']))$errors[] = 'Невірно заповнені дані про батарею';
           
            
            if($errors == false){

                if(Specifications::create($specification)){
                    $success[] = 'Товар успішно добавлено';
                }
            }
        }    

        require_once ROOT . '/views/admin/admin_specification_product/create.php';
        return true;
    }

}
