<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category
 *
 * @author r_truba
 */
class Category 
{
    /**
     * 
     * @return array
     */
    
    
    public static function getCategoryList()
    {
       $db = Db::getConnection();
       //var_dump($db);
       
        $categoryList = [];
        
        $result = $db->query('SELECT id,name FROM category'
                . ' ORDER BY sort_order ASC');
        $i = 0;
        while ($row = $result->fetch()){
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }
        return $categoryList;
    }
    
}
