      
      
<?php require_once(ROOT.'/views/layouts/header.php');?>      
      
      
      
    <hr class="offset-md">

    <div class="box">
      <div class="container">
          <h1>Оформити замовлення</h1>
      </div>
    </div>
    <hr class="offset-md">

    <div class="container">
      <div class="row">
          <div class="col-md-8">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="checkout">
                    <div class="addresses box-select">
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
                                            </div>    
                                                <?php endforeach; ?>
                                                <?php endif;?>
                        <?php if(!empty($address)):?>
                        <h2> Виберіть адресу</h2>

                        <form action="" method="post" name="addressitem">                        
                            <?php foreach ($address as $addresItem):?>

                            <hr class="offset-sm" >
                            <label class="box-default sm-padding">   <input type="radio" name="address" value="<?=$addresItem['id']; ?> " class="hidden" >                            
                        <address  data-style="" >


                            <hr class="offset-sm">

                            <h3 class="no-margin"><i class="ion-ios-person"></i> <?=$user['name']; ?></h3>
                            <p>
                                <i class="ion-ios-location"></i> Місто: <?php echo City::getCityOnId($addresItem['city_id']) ;?>
                            </p>
                            <p>
                                  Вулиця: <?= $addresItem['street'];?>
                            </p>
                                                     <p>
                                  Будинок: №: <?= $addresItem['bulding'];?>
                            </p>
                            </p>
                                                     <p>
                                  Квартира №: <?= $addresItem['rooms'];?>
                            </p>                            

                            <div class="check">
                                <i class="ion-checkmark-round"></i>
                            </div>
                            <hr class="offset-sm">
                        </address>
                            </label>

                            <?php endforeach; ?>
       
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"  value="" name="1" checked="">
                                        Використовувати як платіжну адресу
                                    </label>
                                </div>
                            

                        <?php else: ?>
                            
                            <h2>  Заповніть дані своєї адреси</h2>

                        <?php endif; ?>

                                                                           <hr class="offset-sm">
                        <a href="/cabinet/addaddress" type="button" >
                          Додати нову адресу
                        </a>

                        <hr class="offset-sm">

                        <?php  if(isset($addressView)) 
                        require_once (ROOT.'/views/layouts/addaddress.php');?>

                        <hr class="offset-sm">
                        <hr>
                    </div>

<!--                    <div class="delivery box-select">
                        <h2> 2. Спосіб доставки </h2>
                        <hr class="offset-sm">

                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="box-default sm-padding" data-style="selected">
                                    <hr class="offset-sm">
                                    <img src="../assets/img/shipping/fedex.jpg" title="fedex" alt="fedex" />
                                    <span>&nbsp;&nbsp;2-3 working days</span>
                                    <div class="check">
                                        <i class="ion-checkmark-round"></i>
                                    </div>
                                    <hr class="offset-sm">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box-default sm-padding">
                                    <hr class="offset-sm">
                                    <img src="../assets/img/shipping/dhl.jpg" title="dhl" alt="dhl" />
                                    <span>&nbsp;&nbsp;5-10 working days</span>
                                    <div class="check">
                                        <i class="ion-checkmark-round"></i>
                                    </div>
                                    <hr class="offset-sm">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box-default sm-padding">
                                    <hr class="offset-sm">
                                    <img src="../assets/img/shipping/ems.jpg" title="ems" alt="ems" />
                                    <span>&nbsp;&nbsp;5-10 working days</span>
                                    <div class="check">
                                        <i class="ion-checkmark-round"></i>
                                    </div>
                                    <hr class="offset-sm">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box-default sm-padding">
                                    <hr class="offset-sm">
                                    <img src="../assets/img/shipping/ups.jpg" title="ups" alt="ups" />
                                    <span>&nbsp;&nbsp;12-14 working days</span>
                                    <div class="check">
                                        <i class="ion-checkmark-round"></i>
                                    </div>
                                    <hr class="offset-sm">
                                </div>
                            </div>
                        </div>


                        <hr class="offset-sm">
                        <hr>
                    </div>-->
<!--
                    <div class="payment box-select">
                        <h2> 3. Оплата </h2>
                        <hr class="offset-sm">
                        
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="box-default sm-padding" data-style="selected">
                                    <hr class="offset-sm">
                                    <img src="../assets/img/payments/paypal.jpg" title="paypal" alt="paypal" />
                                    <span>&nbsp;&nbsp;0% Service fee</span>
                                    <div class="check">
                                        <i class="ion-checkmark-round"></i>
                                    </div>
                                    <hr class="offset-sm">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box-default sm-padding">
                                    <hr class="offset-sm">
                                    <img src="../assets/img/payments/stripe.jpg" title="stripe" alt="stripe" />
                                    <span>&nbsp;&nbsp;1% Service fee</span>
                                    <div class="check">
                                        <i class="ion-checkmark-round"></i>
                                    </div>
                                    <hr class="offset-sm">
                                </div>
                            </div>
                        </div>


                        <hr class="offset-sm">
                        <hr>
                    </div>-->

                    <div class="payment box-select">
                        <h2>  Коментарій </h2>
                        <hr class="offset-sm">

                        <textarea name="message"  class="form-control" placeholder="Будь-ласка, залиште нам повідомлення" rows="5" ></textarea>
                        <hr class="offset-sm">
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-8 col-md-4">
            <hr class="offset-sm visible-sm">
              <div class="panel panel-default">
                <div class="panel-body">
                  <h2 class="no-margin">Сума</h2>
                  <hr class="offset-md">

                  <div class="container-fluid">
                      
                      <?php if(is_array($cart)):?>
                      

                      <div class="row">
                          <div class="col-xs-6">
                              <p>загалом </p>
                              <p>знижка</p>
                  
                          </div>
                          <div class="col-xs-6">
                              <p><b><?php echo $cart['subTotalPrice'];?><smal> грн</smal></b></p>
                              <p><b style="text-decoration: line-through; color:red;"> <?=($cart['totalDiscount'] != 0)? $cart['totalDiscount']:'0'; ?><small> грн</small></b></p>
                   
                          </div>
                      </div>

                      <?php endif;?>
                  </div>

                  <div class="checkboxes">
                      <div class="radio">
                          <label>
                              <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                              Promotional Codes
                          </label>
                          <hr class="offset-xs">

                          <div class="input-group">
                            <input type="text" class="form-control input-sm" placeholder="Insert code">
                            <span class="input-group-btn">
                              <button class="btn btn-primary btn-sm" type="button">Apply</button>
                            </span>
                          </div><!-- /input-group -->
                          <hr class="offset-sm">
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                          Coupon
                        </label>
                      </div>
                  </div>
                  <hr>

                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-xs-6">
                              <h3 class="no-margin">До оплати</h3>
                          </div>
                          <div class="col-xs-6">
                              <h3 class="no-margin"><?php echo $cart['totalPrice'];?><smal> грн</smal></h3>
                          </div>
                      </div>
                  </div>
                  <hr class="offset-md">

                  <button class="btn btn-primary btn-lg justify" type="submit"><i class="ion-compose"></i>&nbsp;&nbsp;Купити</button>
                  </form>
                </div>
              </div>
          </div>
      </div>
    </div>
    <hr class="offset-lg">
    <hr class="offset-lg">
    <?php require_once(ROOT.'/views/layouts/footer.php');?>