<?php

/**
 * Description of UserController
 *  
 * @author r_truba
 */
class UserController
{

    /**
     * controller user register
     * @return boolean
     */
    public function actionRegister()
    {
        //$categoryList = Category::getCategoryList();

        $login = '';
        $email = '';
        $phone = '';
        $password = '';
        $password_repeat = '';

        $errors = false;
        $success = false;

        if (!empty($_POST)) {
            $login = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $password_repeat = $_POST['password_repeat'];
            if (!Validate::checkLogin($login))
                $errors[] = 'Поле Ім\'я введино невірно!';
            if (!Validate::checkEmail($email))
                $errors[] = 'Поле email введино невірно!';
            if (!Validate::checkPhone($phone))
                $errors[] = 'Невірний номер телефону!';
            if (!Validate::checkPassword($password))
                $errors[] = 'Поле пароль повинно містити не менше 6 не більше 40 знаків!';
            if (!Validate::checkPasswordRepeat($password, $password_repeat))
                $errors[] = 'Паролі не збігаються!';
            if (User::checkEmailExists($email))
                $errors[] = 'Емайл ' . $email . 'вже зареєстрований!';
            if ($errors == false) {
                if (User::regiseter($login, $email, $phone, $password) == true) {
                    $success[] = 'Ви успішно зареєструвалися!';
                    $user_id = User::checkUserData($email, $password);
                    User::auth($user_id);
                    header("Location:/cabinet/");
                }
            }
        }

        require_once(ROOT . '/views/user/register.php');
        return true;
    }

    /**
     * 
     * @return boolean
     * controller user autorisations
     */
    public function actionLogin()
    {
        //$categoryList = Category::getCategoryList();

        $email = '';
        $password = '';
        $errors = false;
        if (!empty($_POST)) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (!Validate::checkEmail($email))
                $errors[] = "Поле Email введино некорректно!";
            if (!Validate::checkPassword($password))
                $errors[] = 'Поле пароль повинно містити не менше 6 не більше 40 знаків';
            if (!User::checkEmailExists($email))
                $errors[] = 'Дений email не знайдено!';
            if (!User::checkUserData($email, $password))
                $errors[] = 'Невірний пароль!';
            else {
                $user_id = User::checkUserData($email, $password);

                User::auth($user_id);
                header("Location:/cabinet/");
            }
        }
        require_once(ROOT . '/views/user/login.php');
        return true;
    }

    public function actionReset()
    {
        $name = '';
        $email = '';
        $errors = false;
        $success = false;

        if (!empty($_POST)) {
            $email = $_POST['email'];
            $name = $_POST['name'];
            if (!Validate::checkLogin($name))
                $errors[] = 'Поле Ім\'я введино невірно!';
            if (!Validate::checkEmail($email))
                $errors[] = "Поле Email введино некорректно!";
            if (!User::checkEmailExists($email))
                $errors[] = 'Дений email не знайдено!';
            $id = User::getIdonEmailAndName($name, $email);
            if ($id == false)
                $errors[] = 'Даний користувач не зареєестрований';
            if ($errors == false) {
                User::setHeshRepair($id);
                $hash = User::getHeshRepair($id);
                $link = User::lincGenerate($hash['hash_repair']);
                if ($link != false) {
                    $mailer = new EmailPasswordRepair();
                    $res = $mailer->sendPasswordRepair($link, $email, $hash['hash_generate_time']);
                    if ($res)
                        $success[] = 'Інструкція по відновленню пароля відправлена на ваш email';
                }
            }
        }

        require_once ROOT . '/views/user/reset.php';
        return true;
    }

    /**
     * 
     */
    
    public function actionLogout()
    {

        unset($_SESSION['user']);
        Cart::clearCart();
        header("Location: /");
    }

    public function actionPassrepair($linkhash)
    {

        if (User::isGuest()) {
            if (preg_match('~([0-9a-f]{32}$)~', $linkhash)) {
                $user = false;
                $user = User::getUserupOnHash($linkhash);
                if ($user)
                {
                    $errors = false;
                    $success = false;
                    $email = '';
                    $password = '';
                    $password_repeat = ''; 
                   $time =  User::checkHeshtime($user['hash_generate_time'],time());
                        if($time != false){ $success[] = 'Час активності посилання <b>'.ceil ($time / 60).'</b> хв';
                            if(!empty($_POST)){
                                $email = Validate::filterData($_POST['email']);
                                $password = $_POST['password'];
                                
                                
                                $password_repeat = $_POST['password_repeat'];
                                if (!Validate::checkEmail($email))
                                    $errors[] = 'Поле email введино невірно!';
                                if (!Validate::checkPassword($password))
                                    $errors[] = 'Поле пароль повинно містити не менше 6 не більше 40 знаків!';
                                if (!Validate::checkPasswordRepeat($password, $password_repeat))
                                    $errors[] = 'Паролі не збігаються!';
                                if($errors == false){
                                    $res = User::updatePass($email, $password);
                                    if($res != false) $success[] = "Новий пароль збережено";
                                    else $errors[] = 'Пароль зберегти не вдалося, зверніться до адміністратора';
                                }
                            }
                        }
                        else {
                            $errors[] = 'Час активності посилання вичерпано,спробуйте відправити знову ';
                            
                        }
                    require_once ROOT. '/views/user/passwordrepair.php';
                    return true;
                }
                else{
                    header("Location:/");
                }                    
        }
    }

    //passrepair/66bb76755e2d5d1724ab28315a54999a
}
}
