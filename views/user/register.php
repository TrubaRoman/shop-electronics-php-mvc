<?php require_once(ROOT.'/views/layouts/header.php');?>

    <hr class="offset-lg hidden-xs">
    <hr class="offset-md">

    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 md-padding">
          <h1 class="align-center">Новий користувач</h1>
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
          <form class="join"  method="post">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-12">
                    <input type="text" name="name" value="<?=$login; ?>" placeholder="Ім'я" required="" class="form-control" /><br>
                </div>
                <div class="col-sm-12">
                  <input type="text" name="phone" value="<?=$phone; ?>" placeholder="Телефон в форматі (097)000 00 00" required="" class="form-control"   /><br>
                </div>
                <div class="col-sm-12">
                    <input type="email" name="email" value="<?=$email; ?>" placeholder="E-mail" required="" class="form-control"  /><br>
                </div>
                <div class="col-sm-12">
                  <input type="password" name="password" value="<?=$password; ?>" placeholder="Пароль" required="" class="form-control" /><br>
                </div>
                <div class="col-sm-12">
                    <input type="password" name="password_repeat" value="<?=$password_repeat; ?>" placeholder="Повторіть пароль" required="" class="form-control"  /><br>
                </div>
              </div>
            </div>
            <br>

            <button type="submit"  class="btn btn-primary">Реєстрація</button>
            <a href="#" class="xs-margin">Умови ></a>

            <br><br>
            <p>
                 Створивши обліковий запис, ви зможете швидше здійснювати покупки, бути в курсі статусу замовлення та відстежувати замовлення.
            </p>
          </form>

          <br class="hidden-sm hidden-md hidden-lg">
        </div>
      </div>
    </div>
    <br><br>
    <hr class="hidden-xs">
    <br class="hidden-xs">
    <br class="hidden-xs">
 <?php require_once(ROOT.'/views/layouts/footer.php');?>