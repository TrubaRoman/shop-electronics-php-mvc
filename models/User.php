<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author r_truba
 */
class User
{
    /**
     * 
     * @param type $login
     * @param type $email
     * @param type $phone
     * @param type $password
     * @return type boolean result query insert in user table
     */
    public static function regiseter($login,$email,$phone,$password)
    {
        $login = htmlspecialchars($login);
        $login = addslashes($login);
        
        $email = htmlspecialchars($email);
        $email = addslashes($email);
        
        $phone = intval($phone);
        $phone = htmlspecialchars($phone);
        $phone = addslashes($phone);
        
        $password = htmlspecialchars($password);
        $password = addslashes($password);
        $password = md5($password);
        $time = time();
      
        $hash_repair = md5(random_bytes(32)); 
        
       $db = Db::getConnection();
       
       $sql = "INSERT INTO users (name,email,phone,password,hash_repair,reg_date) "
               . "VALUES ( :name,:email,:phone,:password,:hash_repair,:reg_date)";
       
       $result = $db->prepare($sql);
       
       $result->bindParam(':name',$login, PDO::PARAM_STR);
       $result->bindParam(':email',$email, PDO::PARAM_STR);
       $result->bindParam(':phone',$phone, PDO::PARAM_STR);
       $result->bindParam(':password',$password, PDO::PARAM_STR);
       $result->bindParam(':hash_repair',$hash_repair, PDO::PARAM_STR);
       $result->bindParam(':reg_date',$time, PDO::PARAM_STR);
       
       return $result->execute();
        
    }

    /**
     * checks if there is an identical email in the table user
     * @param type $email
     * @return boolean
     */
    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();
        
        $sql = "SELECT COUNT(id) FROM users WHERE "
                . "email = :email";
        
        $result = $db->prepare($sql);
        $result->bindParam('email',$email, PDO::PARAM_STR);
        $result->execute();
        
        if($result->fetchColumn())return true;
        else return false;
    }
}
