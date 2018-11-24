<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of orderMail
 *
 * @author r_truba
 */
class orderMail extends Mailer
{
    public function sendOrderMail($user,$address_id,$message = '',$products)
    {
        if(is_array($user) && !empty($address_id))
        {           
            $address =  $this->getAddress($address_id);
           // print_r($address);die;
            $from = $user['email'];
            $to = $this->conf['adminEmail'];
            $subject = 'Покупка товару';
            $products = json_encode($products);
            $date = date('Y-m-d h:m');
            $tpl = $this->tpldir.'ordersproducts.eml';
            $mail = file_get_contents($tpl);
            
            $body = strtr($mail, [
                '{name}' =>$user['name'],
                '{phone}' => $user['phone'],
                '{email}' => $user['email'],
                '{city}' => $address['city'],
                '{street}' => $address['street'],
                '{build}'=> $address['bulding'],
                '{room}' => $address['rooms'],
                '{order_products}' => $products,
                '{message}' => $message,
                '{date}' => $date
            ]);
            
             return $this->sendMail($from, $to, $subject, $body);
        }
        
    }
    
    private function getAddress($address_id)
    {
        if(is_string($address_id)){
            $address = Address::getAddtessOnId($address_id);

            $city = City::getCityOnId($address['city_id']);
            $address['city'] = $city;
           return $address;
        }
    }
    
    
}
