<?php



/**
 * Description of CabinetController
 *
 * @author r_truba
 */
class CabinetController
{
    public function actionIndex()
    {
                $userId = User::checkLogget();
                $user = User::getUserbyId($userId);
       // $categoryList = Category::getCategoryList();
        

        require_once(ROOT.'/views/cabinet/index.php');
        return true;
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
                
                if(!User::checkUserData($user['email'], $old_password))
                    $errors[] = 'Невірний ваш діючий пароль!';                   
                
                if (!empty($new_password) || !empty($password_repeat))
                {
                    if(Validate::checkPasswordRepeat($new_password, $password_repeat))
                    {
                            $bool = true;
                    }   
                     else {
                         $errors[] = 'Повторіть коректно новий пароль';
                     }                     
                }
                $password = ($bool !== true)? $old_password : $new_password;
                
                if ($errors == false) {

                    if (User::edit($user['id'],$name, $phone, $password)) {
                      $success[] = 'Ви успішно редагували дані!';                         var_dump($password);                 
                    }

                }
            }



            require_once(ROOT . '/views/cabinet/edit.php');
            return true;
        }
    }

}
