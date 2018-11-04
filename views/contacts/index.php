 <?php require_once(ROOT . '/views/layouts/header.php'); ?>
<hr class="offset-md">

    <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div id="Address">
              <address>
                <label class="h3">Наша адреса</label><br>
                1305 UjobenStreet, Suite 800<br>
                San Francisco, CA hz<br>
                <abbr title="Phone">P:</abbr> 0(000)000 00 00
              </address>

              <address>
                <strong>Підтримка</strong><br>
                <a href="mailto:#">sup@example.com</a>
                <br><br>

                <strong>секс-партнери</strong><br>
                <a href="mailto:#">col@example.com</a>
              </address>
            </div>
          </div>
          <div class="col-sm-8">
              <div id="GoMap">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d162.42210875210006!2d23.530593171016168!3d49.356809381650876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473a4e917fcf2129%3A0x477078d444687514!2z0LLRg9C70LjRhtGPINCS0L7Qu9C-0LTQuNC80LjRgNCwINCS0LXQu9C40LrQvtCz0L4sIDksINCU0YDQvtCz0L7QsdC40YcsINCb0YzQstGW0LLRgdGM0LrQsCDQvtCx0LvQsNGB0YLRjCwgODIxMDA!5e0!3m2!1suk!2sua!4v1541232212218" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
        <br>
    </div>

    <div class="gray">
      <div class="container align-center">
        <h1> Відправити повідомлення </h1>
        <p> Заповніть форму, і ми з вами звяжемось <br class="visible-md visible-lg"> Протягом короткого часу. </p>

        <div class="row">
          <div class="col-sm-4 col-sm-offset-4">
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

            <form class="contact" action="" method="post">
              <textarea class="form-control" name="message" placeholder="Повідомлення" required="" rows="5"  ></textarea>
              <br>

              <input type="email" name="email" value="<?=$email; ?>" placeholder="E-mail" required="" class="form-control" />
              <br>

              <button type="submit" class="btn btn-primary justify"> Відправити <i class="ion-android-send"></i> </button>
            </form>
          </div>
        </div>
      </div>
      <br>
    </div>
    <hr class="offset-lg">
    <hr class="offset-lg">
    <?php require_once(ROOT . '/views/layouts/footer.php'); ?>