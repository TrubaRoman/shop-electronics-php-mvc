<?php

/**
 * Description of Address
 *
 * @author r_truba
 */
class Address
{
    public static function getAddressOnUser($id)
    {
        if($id)
        {
           $id = Validate::filterData($id);
           intval($id);
           $db = Db::getConnection();
           $sql = "SELECT * FROM address WHERE user_id = :id";
           
           $result = $db->prepare($sql);
           $result->bindParam(':id',$id, PDO::PARAM_INT);
           $result->execute();
           
           $address = [];
           $i = 0;
           
           while ($row = $result->fetch())
           {
               $address[$i]['id'] = $row['id'];
               $address[$i]['city_id'] = $row['city_id'];
               $address[$i]['street'] = $row['street'];
               $address[$i]['bulding'] = $row['bulding'];
               $address[$i]['rooms'] = $row['rooms'];
               $i++;
           }
           return $address;
            
        }
        
    }
    
    public static function getlastIdAddressinUser($user_id)
    {
        if($user_id){
            $user_id = Validate::filterData($user_id);
            $user_id = intval($user_id);
            
            $db = Db::getConnection();
            $sql = "SELECT max(id) FROM address WHERE user_id = :user_id;";
            
            $res = $db->prepare($sql);
            $res->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $res->execute();

             $res->setFetchMode(PDO::FETCH_NUM);

            $id = $res->fetch();
            return $id[0];
        }
        
    }
        

    public static function checkUserAddress($user_id)
    {
        
        if($user_id){
            $user_id = Validate::filterData($user_id);
            $user_id = intval($user_id);
            
            $db = Db::getConnection();
            $sql = "SELECT COUNT(user_id) FROM address WHERE user_id = :user_id";
            $res = $db->prepare($sql);
            $res->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $res->execute();
            if($res->fetchColumn())return true;
            else return false;
        }
    }
    
    public static function AddUsserAddress($user_id,$city_id,$street,$bulding,$rooms)
    {      
        list($user_id,$city_id,$street,$bulding,$rooms) = Validate::filterData([$user_id,$city_id,$street,$bulding,$rooms]);
        $user_id = intval($user_id);
        $city_id = intval($city_id);
          
        if($user_id){
            
            $db = Db::getConnection();
            $sql = "INSERT INTO address (user_id,city_id,street,bulding,rooms) "
                    . "VALUES (:user_id,:city_id,:street,:bulding,:rooms)";
            
            $res = $db->prepare($sql);
            
            $res->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $res->bindParam(':city_id', $city_id, PDO::PARAM_INT);
            $res->bindParam(':street', $street, PDO::PARAM_STR);
            $res->bindParam(':bulding', $bulding, PDO::PARAM_INT);
            $res->bindParam(':rooms', $rooms, PDO::PARAM_INT);
            
           return $res->execute();
        }
    }
    
    public static function checkAddressExists($street, $bulding, $rooms)
    {
        list($street, $bulding, $rooms) = Validate::filterData([$street, $bulding, $rooms]);
        if (isset($street) && isset($bulding) && isset($rooms)) {
            $db = Db::getConnection();
            $sql = "SELECT COUNT(id) FROM address WHERE street = :street AND "
                    . "bulding = :bulding AND rooms = :rooms"
            ;
            $res = $db->prepare($sql);
            $res->bindParam(':street', $street, PDO::PARAM_STR);
            $res->bindParam(':bulding', $bulding, PDO::PARAM_INT);
            $res->bindParam(':rooms', $rooms, PDO::PARAM_INT);
            $res->execute();

            if ($res->fetchColumn() != 0) {
                return true;
            }

            return false;
        }
    }
    
    public static function getAddtessOnId($id)
    {
        
        if($id){
            
            $id = Validate::filterData($id);
            $id = intval($id);
            
            $db = Db::getConnection();
            $sql = "SELECT * FROM address WHERE id = :id";
            $result = $db->prepare($sql);
           $result->bindParam(':id',$id, PDO::PARAM_INT);
           $result->execute();
           
           $address = [];
           $i = 0;
           
           while ($row = $result->fetch())
           {

               $address[$i]['city_id'] = $row['city_id'];
               $address[$i]['street'] = $row['street'];
               $address[$i]['bulding'] = $row['bulding'];
               $address[$i]['rooms'] = $row['rooms'];
               $i++;
           }
           return $address[0];
            
        }
    }
}
