<?php require_once ROOT.'/views/layouts/header.php';?>

<hr class="offset-md">

    <div class="box">
      <div class="container">
          <h1>Кошик</h1>
          <hr class="offset-sm">
      </div>
    </div>
    <hr class="offset-md">


    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="checkout-cart">
                      <div class="content">

                          
                          <?php if (isset($cartList['productInCart'])):?>
                              <?php foreach ($cartList['products'] as $key => $itemProduct):?>      

                          <div class="media">
                            <div class="media-left">
                              <a href="#">
                                <img class="media-object" src="../assets/img/products/chrome-book-11.jpg" alt="HP Chromebook 11"/>
                              </a>
                            </div>
                            <div class="media-body">
                                <h2 class="h4 media-heading"><?=($itemProduct['name'])?$itemProduct['name']:' Товарів у кошику немає '; ?></h2>
                                <label><?=($itemProduct['brand'])??''; ?></label>
                                <p class="price"><?=$itemProduct['price']; ?><small> грн</small></p>
                                <p class="price through" style="text-decoration: line-through; color:red;"> <?=($itemProduct['discount'] != 0)? $itemProduct['discount'].'<small>грн</small>':''; ?></p>
                            </div>
                            <div class="controls">
                              <div class="input-group">
                                <span class="input-group-btn">
                                  <button class="btn btn-default btn-sm" type="button" data-action="minus"><i class="ion-minus-round"></i></button>
                                </span>
                                  <input type="text" class="form-control input-sm" placeholder="Qty" value="<?php  echo  $cartList['productInCart'][$itemProduct['id']];?>" readonly="">
                                <span class="input-group-btn">
                                  <button class="btn btn-default btn-sm" type="button" data-action="plus"><i class="ion-plus-round"></i></button>
                                </span>
                              </div><!-- /input-group -->

                              <a href="/cart/clear/<?=$itemProduct['id'] ; ?>"> <i class="ion-trash-b"></i> Видалити </a>
                            </div>
                          </div>

                              <?php endforeach;?>
                          
                            </div>
                                                      <a href="/cart/clear/"> <i class="ion-trash-b"></i> Видалити всі товари </a>

                             <?php else :?>
            <h4 class="h3">В кошику пусто</h4>


                  <?php endif;?>

                   

                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-sm-8 col-md-4">
              <hr class="offset-md visible-sm">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <h2 class="no-margin">Сума</h2>
                    <hr class="offset-md">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-6">
                                <p class="h4">Кількість товарів (<?= Cart::countItem();?>)</p>
                            </div>
                            <div class="col-xs-6">
                                <p ><b>$1499</b></p>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-6">
                                <h4 class="no-margin">Загальна сума</h4>
                            </div>
                            <div class="col-xs-6">
                                <h3 class="no-margin"><?php echo ($cartList['totalPrice'])??'0';?><smal> грн</smal></h3>
                           
                            </div>
                            <div class="col-xs-6">
                                <h4 class="no-margin">Знижка</h4>
                            </div>
                            <div class="col-xs-6 product">
                                 <h3 class="no-margin" style="text-decoration: line-through; color:red;"><?php echo ($cartList['totalDiscount'])??'0';?><smal> грн</smal></h3>
                            </div>
                        </div>
                    </div>
                    <hr class="offset-md">

                    <a href="/cabinet/" class="btn btn-primary btn-lg justify"><i class="ion-android-checkbox-outline"></i>&nbsp;&nbsp; Checkout order</a>
                    <hr class="offset-md">

                    <p>Pay your order in the most convenient way</p>
                    <div class="payment-icons">
                      <img src="../assets/img/payments/icon-paypal.svg" alt="paypal">
                      <img src="../assets/img/payments/icon-visa.svg" alt="visa">
                      <img src="../assets/img/payments/icon-mc.svg" alt="mc">
                      <img src="../assets/img/payments/icon-discover.svg" alt="discover">
                      <img src="../assets/img/payments/icon-ae.svg" alt="ae">
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="offset-lg">
    <hr class="offset-lg">
    <?php require_once ROOT.'/views/layouts/footer.php';?>
