<?php
require_once ROOT.'/components/Db.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of News
 *
 * @author r_truba
 */
class News
{   
    /**
     * 
     * @param type $id
     */
    public static function getNewsItemById($id)
    {  

        intval($id);
        if($id){
         $db = Db::getConnection();
        $result = $db->query('SELECT * FROM news WHERE id='.$id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $newsItem = $result->fetch();
        return $newsItem;
        }

    }
    /**
     * return array;
     */
    public static function getNewsList()
    {
        $db = Db::getConnection();
        $newsList = [];
       $result = $db->query('SELECT id,title,date,short_content'
                . ' FROM news'
               . ' ORDER BY date DESC'
               . ' LIMIT 2'
             );
       
       $i = 0;
       while($row = $result->fetch())
       {
           $newsList[$i]['id'] = $row['id'];
           $newsList[$i]['title'] = $row['title'];
           $newsList[$i]['date'] = $row['date'];
           $newsList[$i]['short_content'] = $row['short_content'];
           $i++;
       }
       return $newsList;       
    }
    
    
}
