<?php
require_once ROOT.'/models/News.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NewsController
 *
 * @author r_truba
 */
class NewsController
{
    public function actionIndex()
    {   
       $newsList = [];
       $newsList = News::getNewsList();
       echo '<pre>';
       print_r($newsList);
       echo '</pre>';
    }
    
    public function actionView($id)
    {       
       if($id)
       {
           $newsItem = News::getNewsItemById($id);
           echo '<pre>';
           print_r($newsItem);
           echo '</pre>';
       }
        return true;
    }
}
