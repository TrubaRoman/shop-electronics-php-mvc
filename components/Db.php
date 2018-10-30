<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Db
 *
 * @author r_truba
 */
class Db
{
    public static function getConnection()
    {
        $paramsPatch = ROOT.'/config/db_params.php';
        $params = require $paramsPatch;
        
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn,$params['user'],$params['password'],[PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'']);
       

        return $db;
    }
}
