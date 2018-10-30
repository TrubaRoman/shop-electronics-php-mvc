<?php

/**
 * Description of Product
 *
 * @author r_truba
 */
class Product 
{
     const SHOW_BY_DEFAULT = 4;
     const SHOW_RECOMMENDED_DEFAULT = 4;
     
     /**
      * 
      * @param type $count
      * @return array
      */
     public static function getLatesProducts($count = self::SHOW_BY_DEFAULT)
     {
         $count = intval($count);

         $db = Db::getConnection();
    //      var_dump($db);
         
         $productList = [];
         $result = $db->query('SELECT id,name,price,image,is_new,brand ,discount FROM product '
                 . 'WHERE status = "1" '
                 . 'ORDER BY id DESC '
                 . 'LIMIT '.$count);
         
         
         $i = 0;
         while ($row = $result->fetch())
         {
             $productList[$i]['id'] = $row['id'];
             $productList[$i]['name'] = $row['name'];
             $productList[$i]['price'] = $row['price'];
             $productList[$i]['image'] = $row['image'];
             $productList[$i]['is_new'] = $row['is_new'];
             $productList[$i]['brand'] = $row['brand'];
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
     public static function getProductsListByCategory($categoryId = false)
     {  
         if($categoryId)
         {  $categoryId = intval($categoryId);
             $db = Db::getConnection();
             $products = [];
             $result = $db->query("SELECT id,name,price,image,brand,discount FROM "
                     . "product WHERE status = '1' AND category_id = '$categoryId' "
                     . "ORDER BY id DESC "
                     . "LIMIT ".self::SHOW_BY_DEFAULT);
             
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
             
             $result = $db->query('SELECT * FROM product WHERE id = '.$id);
             $result->setFetchMode(PDO::FETCH_ASSOC);
             return $result->fetch();
         }
     }
     
     public static function getRecomendedProducts($count = self::SHOW_RECOMMENDED_DEFAULT)
     {
         $count = intval($count);
         $db = Db::getConnection();
         $recommendedList = [];
         $result = $db->query("SELECT  id,name,price,image,brand,discount FROM product WHERE "
                 . "status = '1' AND is_recommended "
                 . "LIMIT $count");
         
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
}
