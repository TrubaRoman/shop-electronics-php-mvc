<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Accesscontrol
 *
 * @author r_truba
 */
class Accesscontrol
{
     
    /**
     * 
     * @param type $ip
     * @param type $user_id
     * @return type
     * <p>Обновлює ip по user_id</p>
     */
    public static function updateIpAddr($ip,$user_id)
    {
       $ip = filter_var($ip, FILTER_VALIDATE_IP);
       $user_id = Validate::filterData($user_id);
       //$user_id = intval($user_id);
       $db = Db::getConnection();
       $sql = "UPDATE accesscontrol SET ip = :ip WHERE id = :user_id";
       $res = $db->prepare($sql);
       $res->bindParam(':ip',$ip,PDO::PARAM_STR);
       $res->bindParam(':user_id',$user_id,PDO::PARAM_STR);
       return $res->execute();
    }
    /**
     * ban user in ip
     * @param type $ip
     * @param type $level
     * @return type
     * <p>Записує рівень бану на user</p>
     */
    public static function ban($ip,$level = 1){
       $ip = filter_var($ip, FILTER_VALIDATE_IP);
       $level = Validate::filterData($level);
       $level = intval($level);
       
       $db = Db::getConnection();
       $sql = "UPDATE accesscontrol SET ban = :level WHERE ip = :ip";
       $res = $db->prepare($sql);
       $res->bindParam(':ip',$ip,PDO::PARAM_STR);
       $res->bindParam(':level',$level,PDO::PARAM_INT);
       return $res->execute();
    }
    
    

               
    
    public static function saveIp($ip,$user_id = 'guest')
    {
       $ip = filter_var($ip, FILTER_VALIDATE_IP);
       $user_id = Validate::filterData($user_id);

       $db = Db::getConnection();
       
       $sql = "INSERT INTO accesscontrol (ip,user_id) VALUES (:ip,:user_id)";
       $res = $db->prepare($sql);
       $res->bindParam(':ip', $ip,PDO::PARAM_STR);
       $res->bindParam(':user_id',$user_id, PDO::PARAM_STR);
       return $res->execute();
    }
    
    public static function countBlackAccess($ip,$user_id,$descropt_black_access)
    {  
        $ip = filter_var($ip, FILTER_VALIDATE_IP);
        list($ip,$user_id,$descropt_black_access) = Validate::filterData([$ip,$user_id,$descropt_black_access]);

         $db = Db::getConnection();
         $sql = "UPDATE accesscontrol SET "
                 . "user_id = :user_id, " 
                 . "descropt_black_access = :descropt_black_access, "
                 . "try_black_access = try_black_access+1 "
                 . " WHERE ip = :ip " ;
        // var_dump($sql);die;
         $res = $db->prepare($sql);
         $res->bindParam(':user_id',$user_id, PDO::PARAM_STR);
         $res->bindParam(':ip', $ip,PDO::PARAM_STR);
  //       $res->bindParam(':try_black_access',+1,PDO::PARAM_INT);
         $res->bindParam(':descropt_black_access', $descropt_black_access,PDO::PARAM_STR);
         return $res->execute();
        
    }    
    
    /**
     * 
     * @param type $ip
     * @return boolean
     * <p>Провіряє наявність даного ip</p>
     */
    public static function checkIp($ip){
        
         $ip = filter_var($ip, FILTER_VALIDATE_IP);
         $db  = Db::getConnection();
         $sql = "SELECT COUNT(id) FROM accesscontrol WHERE ip = :ip ";
         
        $result = $db->prepare($sql);
        $result->bindParam(':ip', $ip, PDO::PARAM_STR);
        $result->execute();
        return $result->fetchColumn();

    }
    
    public static function getCountBlackAccess($ip)
    {
          $ip = filter_var($ip, FILTER_VALIDATE_IP);
         $db  = Db::getConnection();
         $sql = "SELECT try_black_access FROM accesscontrol WHERE ip = :ip ";
         
        $result = $db->prepare($sql);
        $result->bindParam(':ip', $ip, PDO::PARAM_STR);
        $result->execute();
        return $result->fetchColumn();
 
    }

}
