<?php

/**
 * Description of Product
 *
 * @author r_truba
 */
class Product 
{
     const SHOW_BY_DEFAULT = 2;
     const SHOW_RECOMMENDED_DEFAULT = 4;
     
     /**
      * 
      * @param type $count
      * @return array
      */
     public static function getLatesProducts($count = self::SHOW_BY_DEFAULT,$page = 1,$order = 'DESC')
     {
         $count = intval($count);
         $offset = self::getOffset($page);
         $db = Db::getConnection();
    //      var_dump($db);
         if($order == 'ASC'){
         $sql = 'SELECT id,name,price,image,is_new,brand ,code,discount FROM product '
                 . 'WHERE status = "1" '
                 . 'ORDER BY id ASC '
                 . 'LIMIT :count'
                 .' OFFSET :offset';
         }
 else {$sql = 'SELECT id,name,price,image,is_new,brand ,code,discount FROM product '
                 . 'WHERE status = "1" '
                 . 'ORDER BY id DESC '
                 . 'LIMIT :count'
                 .' OFFSET :offset';}
         $result = $db->prepare($sql);
         $result->bindParam(':count', $count, PDO::PARAM_INT);
         $result->bindParam(':offset', $offset, PDO::PARAM_INT);
         $result->execute();
     
    $productList = [];
         
         $i = 0;
         while ($row = $result->fetch())
         {
             $productList[$i]['id'] = $row['id'];
             $productList[$i]['name'] = $row['name'];
             $productList[$i]['price'] = $row['price'];
             $productList[$i]['image'] = $row['image'];
             $productList[$i]['is_new'] = $row['is_new'];
             $productList[$i]['brand'] = $row['brand'];
             $productList[$i]['code'] = $row['code'];
             $productList[$i]['discount'] = $row['discount'];
             $i++;
         }
         
         return $productList;
     }    
     
/**
 * 
 * @param type $categoryId
 * @return array products by category
 */
     public static function getProductsListByCategory($categoryId = false,$page = 1)
     {  
         if($categoryId)
         {  $page = intval($page);
            $offset = self::getOffset($page);
             $categoryId = intval($categoryId);
             $db = Db::getConnection();
       
             
             $sql = "SELECT id,name,price,image,brand,discount FROM "
                     . "product WHERE status = '1' AND category_id = :category_id "
                     . "ORDER BY id DESC "
                     . "LIMIT :defoult "
                     . " OFFSET :offset";
            
             $defoult = self::SHOW_BY_DEFAULT;
             $result = $db->prepare($sql);
             $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
             $result->bindParam(':defoult',$defoult, PDO::PARAM_INT);
             $result->bindParam(':offset',$offset, PDO::PARAM_INT);
             $result->execute();

       
             $products = [];  
             $i = 0;
             while ($row = $result->fetch())
             {
                 $products[$i]['id'] = $row['id'];
                 $products[$i]['name'] = $row['name'];
                 $products[$i]['price'] = $row['price'];
                 $products[$i]['image'] = $row['image'];
                 $products[$i]['brand'] = $row['brand'];
                 $products[$i]['discount'] = $row['discount'];
                 $i++;
             }
             
             return $products;
         }
     }
    
     /**
      * 
      * @param type $id
      * @return array produt item 
      */
     public static function getProductById($id)
     {
         $id = intval($id);
         if($id){
             
             $db = Db::getConnection();
             
             $sql = "SELECT * FROM product WHERE id = :id ";
             $result = $db->prepare($sql);
             $result->bindParam(':id', $id, PDO::PARAM_INT);
             $result->setFetchMode(PDO::FETCH_ASSOC);
             $result->execute();
             return $result->fetch();
         }
     }
     /**
      * 
      * @param type $count
      * @return type array recommended products
      */
     public static function getRecomendedProducts($count = self::SHOW_RECOMMENDED_DEFAULT)
     {
         $count = intval($count);
         $db = Db::getConnection();

         $sql = "SELECT  id,name,price,image,brand,discount FROM product WHERE "
                 . "status = '1' AND is_recommended "
                 . "LIMIT :count";
         $result = $db->prepare($sql);
         $result->bindParam(':count', $count, PDO::PARAM_INT);
         $result->execute();
         $recommendedList = [];
         $i = 0;
         while ($row = $result->fetch())
         {
             $recommendedList[$i]['id'] = $row['id'];
             $recommendedList[$i]['name'] = $row['name'];
             $recommendedList[$i]['price'] = $row['price'];
             $recommendedList[$i]['image'] = $row['image'];
             $recommendedList[$i]['brand'] = $row['brand'];
             $recommendedList[$i]['discount'] = $row['discount'];
             $i++;
         }
         return $recommendedList;
     }
     
     public static function getOffset($page = 1)
     {
         $page = intval($page);
         return ($page-1)* self::SHOW_BY_DEFAULT;
     }
     
     /**
      * 
      * @param type $categoryId
      * @return string total count 
      */
     public static function getTotalProductsInCategory($categoryId = false)
    {
        $db = Db::getConnection();

        if ($categoryId != false || is_numeric($categoryId)) {
            $categoryId = intval($categoryId);
            $sql = "SELECT count(id) AS count FROM product "
                    . "WHERE status = '1' AND category_id = :category_id";
            $result = $db->prepare($sql);
            $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
            $result->execute();
        } else {
            $result = $db->query("SELECT count(id) AS count FROM product "
                    . "WHERE status = '1'");
        }

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }
    
    public static function getProductsByIds($idsProducts)
    {
        $products = [];
        $db = Db::getConnection();
       $place_holders = implode(',', array_fill(0, count($idsProducts), '?'));


        $sql = "SELECT * FROM product WHERE status = '1' AND id IN ($place_holders)";

        $result = $db->prepare($sql);

        $result->execute($idsProducts);
        
        
        $i = 0;
        while ($row = $result->fetch())
        {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['brand'] = $row['brand'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['discount'] = $row['discount'];
            $i++;
        }


        return $products;
        
        
    }
    
    public static function getProductsAll()
    {
                $products = [];
        $db = Db::getConnection();
    


        $sql = "SELECT * FROM product ";

        $result = $db->prepare($sql);

        $result->execute();
        
        
        $i = 0;
        while ($row = $result->fetch())
        {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['brand'] = $row['brand'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['discount'] = $row['discount'];
            $i++;
        }


        return $products;
             
    }
    
    public static function deleteProductInId($id)
    {
        
        $id = Validate::filterData($id);
        $id = intval($id);
        $db = Db::getConnection();
        $sql = "DELETE FROM product WHERE id = :id";
        
        $res = $db->prepare($sql);
        
        $res->bindParam(':id', $id, PDO::PARAM_INT);
       return $res->execute();
        
    }

}
