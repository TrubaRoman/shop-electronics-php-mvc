<?php

/**
 * Description of CabinetController
 *
 * @author r_truba
 */
class CabinetController extends GlobalController
{

    public function actionIndex()
    {
        if (!User::isGuest()) {
            $userId = User::checkLogget(); //якщо гість, то до дому || получемо user_id

            if (!Cart::getProductsInCart())// якщо кошик пустий, то додому
                header("Location:/");
            $cart = self::getCart(); // збираємо товари з кошика

            $user = User::getUserbyId($userId); // получаємо дані юзера


            $errors = false;

            $message = '';
            if (Address::checkUserAddress($userId)) {
                $address = Address::getAddressOnUser($userId);

                if (isset($_POST['address'])) {
                    $addressId = $_POST['address'];
                    $message = Validate::filterData($_POST['message']);
                    if (!Validate::checkMessage($message))
                        $errors[] = 'Повідомлення повинно мічтинти не меше 2, не більше 500 символів';
                    if ($errors === false) {
                        $result = Oreder::saveOrder($userId, $addressId, $message, $cart['productInCart']);
                        if ($result) {
                            //  Cart::clearCart();
                            header("Location:/ordersuccess");
                        }
                    }
                } else
                    $errors[] = 'Виберіть свою адресу, або додайте нову';
            }


            require_once(ROOT . '/views/cabinet/index.php');
            return true;
        }
    }

    public function actionAddaddress()
    {
        if (!User::isGuest()) {
            $userId = User::checkLogget(); //якщо гість, то до дому || получемо user_id

            if (!Cart::getProductsInCart())// якщо кошик пустий, то додому
                header("Location:/");
            $cart = self::getCart(); // збираємо товари з кошика


            $user = User::getUserbyId($userId); // получаємо дані юзера



            $errors = false;

            $message = '';
            $addressView = true;

            $address = false;
            $addcity = '';
            $street = '';
            $bulding = '';
            $room = '';
            $cityes = City::getCity(); // получаємо міста в drobdown

            if (!empty($_POST)) {

                $addcity = Validate::filterData($_POST['city']);
                $street = Validate::filterData($_POST['street']);
                $bulding = Validate::filterData($_POST['bulding']);
                $room = Validate::filterData($_POST['room']);
                $message = Validate::filterData($_POST['message']);
                $idsite = (City::getCityIdOnName($addcity)) ?? false;
                if (!$idsite)
                    $errors[] = 'Виберіть місто';
                if (!Validate::checkStrings($street, $bulding, $room))
                    $errors[] = 'Занадто коротка адреса!';

                if (!Validate::checkBlackList($street, $bulding, $room, $message))
                    $errors[] = 'ти куда лізеш?';

                if (Address::checkAddressExists($street, $bulding, $room))
                    $errors[] = 'Така адреса вже існує';
                if ($errors === false) {
                    $result = Address::AddUsserAddress($userId, $idsite, $street, $bulding, $room);

                    if ($result) {
                        $success[] = "Ви добавили нову адресу, вашу адресу збережно";
                       $address_id = Address::getlastIdAddressinUser($userId);

                        $result = Oreder::saveOrder($userId, $address_id, $message,$cart['productInCart']);
                        if($result)
                        header("Location:/ordersuccess");
                    }
                }
            }
            require_once(ROOT . '/views/cabinet/index.php');
            return true;
        }
    }

    public function actionEdit()
    {
        if (!User::isGuest()) {

            $userId = User::checkLogget();
            $user = User::getUserbyId($userId);
            $name = '';
            $phone = '';
            $old_password = '';
            $new_password = '';
            $password_repeat = '';


            $success = false;
            $errors = false;

            if (!empty($_POST)) {
                $bool = false;
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $old_password = $_POST['old_password'];
                $new_password = $_POST['new_password'];
                $password_repeat = $_POST['password_repeat'];



                if (!Validate::checkLogin($name))
                    $errors[] = 'Поле Ім\'я введино невірно!';
                if (!Validate::checkPhone($phone))
                    $errors[] = 'Невірний номер телефону!';
                if (!Validate::checkPassword($old_password))
                    $errors[] = 'Поле пароль повинно містити не менше 6 не більше 40 знаків!';

                if (!User::checkUserData($user['email'], $old_password))
                    $errors[] = 'Невірний ваш діючий пароль!';

                if (!empty($new_password) || !empty($password_repeat)) {
                    if (Validate::checkPasswordRepeat($new_password, $password_repeat)) {
                        $bool = true;
                    } else {
                        $errors[] = 'Повторіть коректно новий пароль';
                    }
                }
                $password = ($bool !== true) ? $old_password : $new_password;

                if ($errors == false) {

                    if (User::edit($user['id'], $name, $phone, $password)) {
                        $success[] = 'Ви успішно редагували дані!';
                    }
                }
            }



            require_once(ROOT . '/views/cabinet/edit.php');
            return true;
        }
    }

    public function actionOrdersuccess()
    {
        if (!User::isGuest()) {
            $cartList = parent::getCart();
            require_once(ROOT . '/views/cabinet/ordersuccess.php');
        }
    }

}
