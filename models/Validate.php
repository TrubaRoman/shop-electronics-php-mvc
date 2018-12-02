<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validate
 *
 * @author r_truba
 */
class Validate
{

    /**
     * 
     * @param type $login
     * @return boolean
     */
    public static function checkLogin($login)
    {
        $length = strlen($login);
        return ($length <= 2 || $length >= 30 ) ? false : true;
    }

    /**
     * 
     * @param type $email
     * @return boolean
     */
    public static function checkEmail($email)
    {
        return(filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : true;
    }
    
    public static function checkMessage($message)
    {
        
        $length = strlen($message);
        return ($length > 2 || $length < 500)? true : false;
    }

    /**
     * 
     * @param type $password
     * @return boolean
     */
    public static function checkPassword($password)
    {
        $length = strlen($password);
        return ($length >= 6 || $length <= 40) ? true : false;
    }

    /**
     * 
     * @param type $password
     * @param type $password_repeat
     * @return boolean
     */
    public static function checkPasswordRepeat($password, $password_repeat)
    {

        if ($password_repeat === $password) {
            return true;
        } else
            return false;
    }

    /**
     * 
     * @param type $phone
     * @return boolean
     */
    public static function checkPhone($phone)
    {
        if (!preg_match("/[+380][0-9]{7}/i", $phone)) return false;

       return true;
    }
    /**
     * 
     */
    public static function checkStrings()
    {
        
        $string = func_get_args();
        
        foreach ($string as $item)
        {  
            if (!is_numeric($item)) {
                if (strlen($item) < 3)
                    return false;
            }
            $int = intval($item);
            if((strlen($int)<1 )  || (strlen($int) > 4))return false; 
        }
        return true;
        
    }

        public static function filterData($params)
    {
        if(is_array($params))
        {
            for($i = 0;$i < count($params);$i++){
                $params[$i] = trim($params[$i]);
                $params[$i] = htmlspecialchars($params[$i]);
                $params[$i] = addslashes($params[$i]);

            }
            return $params;
        }  
        
        if(is_string($params) || is_integer($params)){
                $params = trim($params);
                $params = htmlspecialchars($params);
                $params = addslashes($params);
                return $params;
        }
            
    }
   // дописати
    public static function checkBlackList()
    {  $params = func_get_args();
        
        if ($params)
        {
            $path = ROOT.'/config/check.php';
            $blacklist = require_once($path);
            foreach ($blacklist['blacklist'] as $list){

                for($i = 0;$i< count($params);$i++){
 
                if(preg_match("~$list~", $params[$i]))return false;
                }
            }
                return true;
        }
    }

}
