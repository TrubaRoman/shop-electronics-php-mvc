 <?php require_once(ROOT.'/views/layouts/header.php');?>
      
    <hr class="offset-lg hidden-xs">
    <hr class="offset-md">

    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 md-padding">
          <h1 class="align-center">Війти в кабінет</h1>
          <br>

          <form class="signin" action="index.php" method="post">
            <input type="email" name="email" value="" placeholder="E-mail" required="" class="form-control" />
            <br>
            <input type="password" name="password" value="" placeholder="Password" required="" class="form-control" />
            <br>

            <button type="submit" class="btn btn-primary">Вхід</button>
            <a href="#forgin-password" data-action="Forgot-Password" class="xs-margin">Забули пароль? ></a>
            <br><br>

            <p>
                Якщо у вас вже є обліковий запис, будь-ласка, увійдіть.
            </p>
            <hr class="offset-xs">

            <a href="#facebook" class="btn btn-facebook"> <i class="ion-social-facebook"></i> Login with Facebook </a>
            <hr class="offset-sm">

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

 <?php require_once(ROOT.'/views/layouts/footer.php');?>