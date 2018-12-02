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
        if ($id_product) {
            $id_product = intval($id_product);

            $db = Db::getConnection();
            $sql = "SELECT * FROM specifications WHERE product_id = :id_product";
            $result = $db->prepare($sql);
            $result->bindParam(':id_product', $id_product, PDO::PARAM_INT);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
    }

    public static function deleteSpecificByIdProduct($id_product)
    {
        if ($id_product) {
            $id_product = intval($id_product);
            $id_product = Validate::filterData($id_product);

            $db = Db::getConnection();
            $sql = "DELETE  FROM specifications WHERE product_id = :id_product";
            $result = $db->prepare($sql);
            $result->bindParam(':id_product', $id_product, PDO::PARAM_INT);
            return $result->execute();
        }
    }

    public static function create($options)
    {
        if (is_array($options)) {
            $db = Db::getConnection();

            $sql = "INSERT INTO  specifications "
                    . "(product_id,diagonal,operating_system,processor,graphics,"
                    . "memory,hard,wireless,battery,additionally)"
                    . " VALUES (:product_id,:diagonal,:operating_system,:processor,:graphics,"
                    . ":memory,:hard,:wireless,:battery,:additionally) ";
           

            $res = $db->prepare($sql);
         
            $res->bindParam(':product_id', $options['product_id'], PDO::PARAM_INT );
            $res->bindParam(':diagonal', $options['diagonal'], PDO::PARAM_INT);
            $res->bindParam(':operating_system', $options['operating_system'],PDO::PARAM_STR );
            $res->bindParam(':processor', $options['processor'],PDO::PARAM_STR );
            $res->bindParam(':graphics', $options['graphics'],PDO::PARAM_STR );
            $res->bindParam(':memory', $options['memory'], PDO::PARAM_STR );
            $res->bindParam(':hard', $options['hard'], PDO::PARAM_STR );
            $res->bindParam(':wireless', $options['wireless'], PDO::PARAM_STR );
            $res->bindParam(':battery', $options['battery'], PDO::PARAM_STR );
            $res->bindParam(':additionally', $options['additionally'], PDO::PARAM_STR );

            
            return $res->execute();
        }
    }

}
