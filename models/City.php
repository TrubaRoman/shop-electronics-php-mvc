<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sity
 *
 * @author r_truba
 */
class City
{
    public static function getCity()
    {
        $cities = [];
        
        $db = Db::getConnection();
        
        $result = $db->query('SELECT * FROM city '
                . 'ORDER BY city_name');
        
        $i = 0;
        while ($row = $result->fetch())
        {
            $cities[$i]['id'] = $row['id'];
            $cities[$i]['city_name'] = $row['city_name'];
            $i++;
        }
        return $cities;
    
    }
    
    public  static function getCityIdOnName($city)
    {
        $city = strval($city);
        $city = Validate::filterData($city);
        
        if($city){
            $db = Db::getConnection();
            $sql = "SELECT id FROM city WHERE city_name = :city";
            $res = $db->prepare($sql);
            $res->bindParam(':city', $city, PDO::PARAM_STR);
            $res->setFetchMode(PDO::FETCH_ASSOC);
            $res->execute();
            $ids =  $res->fetch();
            return $ids['id'];
        }
        return false;
    }
    
    public static function getCityOnId($id_city)
    {
        if($id_city){
            
            $id_city = Validate::filterData($id_city);
            $id_city = intval($id_city);
            
            $db = Db::getConnection();
            $sql = "SELECT city_name FROM city WHERE id = :id_city";
            $res = $db->prepare($sql);
            $res->bindParam(':id_city',$id_city, PDO::PARAM_INT);
            $res->execute();
            $city = $res->fetch();
            return $city['city_name'];
            
        }
    }
}
