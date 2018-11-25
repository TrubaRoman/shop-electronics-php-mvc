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
    public static function regiseter($login, $email, $phone, $password)
    {
        list($login, $email, $phone, $password) = Validate::filterData([$login, $email, $phone, $password]);
        $password = md5($password);

        $time = time();

        $db = Db::getConnection();

        $sql = "INSERT INTO users (name,email,phone,password,reg_date) "
                . "VALUES ( :name,:email,:phone,:password,:reg_date)";

        $result = $db->prepare($sql);

        $result->bindParam(':name', $login, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        $result->bindParam(':reg_date', $time, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function getUserbyIdAll($user_id)
    {
        if ($user_id) {
            $id = intval($user_id);
            $db = Db::getConnection();
            $sql = "SELECT * FROM users WHERE id = :id";

            $reslut = $db->prepare($sql);
            $reslut->bindParam(':id', $id, PDO::PARAM_STR);
            $reslut->setFetchMode(PDO::FETCH_ASSOC);
            $reslut->execute();

            return $reslut->fetch();
        }
    }

    /**
     * 
     * @param type $email
     * @param type $password
     * @return boolean
     */
    public static function checkUserData($email, $password)
    {
        list($email, $password) = Validate::filterData([$email, $password]);
        $password = md5($password);

        if ($email && $password) {
            $db = Db::getConnection();
            $sql = "SELECT id FROM users WHERE email = :email AND password = :password ";

            $result = $db->prepare($sql);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            $result->bindParam(':password', $password, PDO::PARAM_STR);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetchColumn();
        }
        return false;
    }

    public static function edit($id, $name, $phone, $password)
    {
        list($id, $name, $phone, $password) = Validate::filterData([$id, $name, $phone, $password]);

        $id = intval($id);
        $password_hash = md5($password);

        if ($id) {
            $db = Db::getConnection();

            $sql = "UPDATE users SET "
                    . "name = :name, "
                    . "phone = :phone, "
                    . "password = :password "
                    . "WHERE id = :id ";

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->bindParam(':name', $name, PDO::PARAM_STR);
            $result->bindParam(':phone', $phone, PDO::PARAM_STR);
            $result->bindParam(':password', $password_hash, PDO::PARAM_STR);
            return $result->execute();
        }
        return false;
    }
    
    
    
        public static function updatePass($email,$password)
    {
        list($email, $password) = Validate::filterData([$email, $password]);

        
        $password_hash = md5($password);

        if ($email) {
            $db = Db::getConnection();

            $sql = "UPDATE users SET "
                    . "password = :password "
                    . "WHERE email = :email ";

            $result = $db->prepare($sql);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            $result->bindParam(':password', $password_hash, PDO::PARAM_STR);
            return $result->execute();
        }
        return false;
    }

    /**
     * 
     * @param type $user_id
     * is method write id user in session
     */
    public static function auth($user_id)
    {

        $_SESSION['user'] = $user_id;
    }

    /**
     * 
     * @return 
     * 
     */
    public static function checkLogget()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header("Location:/login");
    }

    /**
     * 
     * @return boolean
     */
    public static function isGuest()
    {

        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    /**
     * checks if there is an identical email in the table user
     * @param type $email
     * @return boolean
     */
    public static function checkEmailExists($email)
    {
        $email = Validate::filterData($email);
        $db = Db::getConnection();

        $sql = "SELECT COUNT(id) FROM users WHERE "
                . "email = :email";

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        else
            return false;
    }

    public static function getUserByEmail($email)
    {
        $email = Validate::filterData($email);
        if ($email) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM users WHERE email = :email';
            $result = $db->prepare($sql);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            return $result->fetch();
        }
        return false;
    }
    
   
    public static function getUserbyId($user_id)
    {
       $id =  Validate::filterData($user_id);
        if ($id) {
            $id = intval($id);
            $db = Db::getConnection();
            $sql = "SELECT id,name,email,phone FROM users WHERE id = :id";

            $reslut = $db->prepare($sql);
            $reslut->bindParam(':id', $id, PDO::PARAM_STR);
            $reslut->setFetchMode(PDO::FETCH_ASSOC);
            $reslut->execute();
            
            return $reslut->fetch();
        }
    }
    
    public static function getIdonEmailAndName($name,$email){
        
    list($name,$email) = Validate::filterData([$name,$email]);
    
    if($name && $email){
    //    var_dump($email);die;
        $db = Db::getConnection();
        $sql = "SELECT id FROM users WHERE "
                . " email = :email AND"
                . " name = :name";

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->execute();
       
         return $result->fetchColumn();


    }
    
    } 
    public static function setHeshRepair($id)
    {
   
        Validate::filterData($id);
        $id = intval($id);
        if($id){
                $time = time();
                $hash_repair = md5(random_bytes(32).$time);           
                
                $db = Db::getConnection();
                $sql = "UPDATE users SET "
                        . "hash_repair = :hash_repair, "
                        . "hash_generate_time = :time "
                        . "WHERE id = :id";
                $result = $db->prepare($sql);
                $result->bindParam(':hash_repair', $hash_repair, PDO::PARAM_STR);
                $result->bindParam(':time', $time, PDO::PARAM_INT);
                $result->bindParam(':id', $id, PDO::PARAM_STR);
                return $result->execute();
        }
        

    }
    
    public static function getHeshRepair($user_id)
    {
        
               $id =  Validate::filterData($user_id);
        if ($id) {
            $id = intval($id);
            $db = Db::getConnection();
            $sql = "SELECT hash_repair,hash_generate_time FROM users WHERE id = :id";

            $reslut = $db->prepare($sql);
            $reslut->bindParam(':id', $id, PDO::PARAM_STR);
            $reslut->setFetchMode(PDO::FETCH_ASSOC);
            $reslut->execute();

            return $reslut->fetch();
        }
    }

        public static function lincGenerate($hash)
    {
        $langth = strlen($hash);
        if ($langth !== 32){
            return false;
        }
       $link = '/passrepair/'.$hash;
        return $link;

    }
    
    public static function getUserupOnHash($hash)
    {
        if(preg_match('~([0-9a-f]{32}$)~', $hash)){
            
            $db = Db::getConnection();
            $sql = "SELECT id,name,email,hash_generate_time FROM users "
                    . "WHERE hash_repair = :hash";
            $res = $db->prepare($sql);
            $res->bindParam(':hash', $hash, PDO::PARAM_STR);
           $res->setFetchMode(PDO::FETCH_ASSOC);
            $res->execute();

            return $res->fetch();
            
        }
        
    }


    public static function checkHeshtime($start, $end, $numb_of_minutes = LINK_TIME)
    {
        $time = $end - $start;

        $numb_second = $numb_of_minutes * 60;

        if ($time > $numb_second) {
            return false;
        }
        return $numb_second - $time;
    }
    
    
    
    

}
