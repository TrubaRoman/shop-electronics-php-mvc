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
            $sql = "SELECT * FROM specifications WHERE product_id = :id_product";
            $result  =  $db->prepare($sql);
            $result->bindParam(':id_product',$id_product, PDO::PARAM_INT);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            
            return $result->fetch();
        }
    }
}
