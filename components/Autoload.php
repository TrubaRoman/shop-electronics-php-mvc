<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Autoload
 *
 * @author r_truba
 */
function my_autoload($class_name)
{
    $array_patch = [
        '/components/',
        '/models/',
        ];
    
    foreach ($array_patch as $patch){
      
       $patch =  ROOT.$patch.$class_name.'.php';
       if(is_file($patch))           require_once $patch;
      
    }
    

}
    spl_autoload_register('my_autoload');           

