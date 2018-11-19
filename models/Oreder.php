<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Oreder
 *
 * @author r_truba
 */
class Oreder
{
    public static function saveOrder($user_id,$address_id,$user_coments,$order_products,$status = 1)
    {

        $order_products = json_encode($order_products);

        list($user_id,$address_id,$user_coments,$order_products,$status) = Validate::filterData([$user_id,$address_id,$user_coments,$order_products,$status]);
              $user_id = intval($user_id);
              $address_id = intval($address_id);
              $status = intval($status);
              
              $db = Db::getConnection();
              $sql = "INSERT INTO order_products (user_id,user_comments,order_products,status,address_id)"
                      . " VALUES (:user_id,:user_comments,:order_products,:status,:address_id)";
              
              $res = $db->prepare($sql);
              $res->bindParam(':user_id',$user_id, PDO::PARAM_INT);
              $res->bindParam(':user_comments',$user_coments, PDO::PARAM_STR);
              $res->bindParam(':order_products',$order_products, PDO::PARAM_STR);
              $res->bindParam(':status',$status, PDO::PARAM_INT);
              $res->bindParam(':address_id',$address_id, PDO::PARAM_INT);
              
              return $res->execute();
              
    }
}
