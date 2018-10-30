<?php


/**
 * Description of Specifications
 *
 * @author r_truba
 */
class Specifications
{
    
    public static function getSpetificByIdProduct($id_product)
    {
        if($id_product){
            $id_product = intval($id_product);
            
            $db = Db::getConnection();
            
            $result  =  $db->query('SELECT * FROM specifications WHERE product_id = '.$id_product);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            
            return $result->fetch();
        }
    }
}
