<?php require_once(ROOT . '/views/layouts/header.php'); ?>

<hr class="offset-lg hidden-xs">
<hr class="offset-md">

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 md-padding">
            <h1 class="align-center">Редагувати дані</h1>
            <br>
            <?php
            if (isset($errors) && is_array($errors)):
                ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error): ?>
                        <ul>
                            <li><small><?php echo $error; ?></small></li>
                        </ul>

                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php
            if (isset($success) && is_array($success)):
                ?>
                <div class="alert alert-success">
                    <?php foreach ($success as $success_message): ?>
                        <ul>
                            <li><small><?php echo $success_message; ?></small></li>
                        </ul>

                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form class="signin"  method="post">
                    <input type="text" name="name" value="<?=$user['name']; ?>" placeholder="Ім'я" required="" class="form-control" />
                <br>
               
                    <input type="text" name="phone" value="<?= $user['phone']; ?>" placeholder="Телефон в форматі +38097 000 00 00" required="" class="form-control"   />
                <br>
                <input type="password" name="old_password" value="" placeholder="Діючий пароль" required="" class="form-control" />
                <br>
                <input type="password" name="new_password" value="" placeholder="Новий пароль()"  class="form-control" />
                <br>
                <input type="password" name="password_repeat" value="" placeholder="Повторіть пароль"  class="form-control" />
                <br>

                <button type="submit" class="btn btn-primary">Змінити</button>
                <a href="#forgin-password" data-action="Forgot-Password" class="xs-margin">Забули пароль? ></a>
                <br><br>

                <p>
                    Якщо у вас вже є обліковий запис, будь-ласка, увійдіть.
                </p>
                <hr class="offset-xs">

                <p>
                    У вас нема аккаунту? Створіть вже зараз! <a href="/signup/"> Реєстрація > </a>
                </p>

            </form>
        </div>
    </div>
</div>
<br><br>
<br class="hidden-xs">
<br class="hidden-xs">

<?php require_once(ROOT . '/views/layouts/footer.php'); ?>