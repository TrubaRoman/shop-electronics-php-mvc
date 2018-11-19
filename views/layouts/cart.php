
<div class="cart" data-toggle="inactive">
      <div class="label">
          <i class="ion-bag"></i><span id="cart-count"><?php echo (Cart::countItem())??'';?></span> 
      </div>

      <div class="overlay"></div>

      <div class="window">
        <div class="title">
          <button type="button" class="close"><i class="ion-android-close"></i></button>
          <h1 class="h3 info">Кошик</h1>
        </div>

        <div class="content">

            <?php if (isset($cartList['productInCart']) && !empty($cartList['productInCart'])):?>  
                <?php foreach ($cartList['products'] as $item):?>
          <div class="media">
            <div class="media-left">
              <a href="#">
                <img class="media-object" src="/assets/img/products/asus-transformer.jpg" alt="HP Chromebook 11"/>
              </a>
            </div>
            <div class="media-body">
                <h2 class="h4 media-heading"><?=$item['name'];?></h2>
              <label><?=$item['brand'];?></label>
              <p class="price"><?=(isset($item['price']))?$item['price']:'';?><small> грн</small></p>
<p class="no-margin" style="text-decoration: line-through; color:red;"> <?=($item['discount'] != 0)? $item['discount'].'<small>грн</small>':''; ?></p>
            </div>
            <div class="controls">
              <div class="input-group">
                <span class="input-group-btn">
                  <button class="btn btn-default btn-sm" type="button" data-action="minus"><i class="ion-minus-round"></i></button>
                </span>
                  <input type="text" class="form-control input-sm"  placeholder="Qty"  value="<?php  echo Cart::countOneProducts($item['id']);?>" readonly="" >
                <span class="input-group-btn">
                    <button class="btn btn-default btn-sm" id="plus"  type="button" data-action="plus" data-id ="<?=$item['id']; ?>"><i class="ion-plus-round class btn-rounded"  ></i></button>
                </span>
              </div><!-- /input-group -->

              <a href="/cart/clear/<?=$item['id']; ?>"> <i class="ion-trash-b"></i> Очистити </a>
            </div>
          </div>
                <?php endforeach;?>
                                          <p> <a href="/cart/clear/"> <i class="ion-trash-b"></i>   Видалити всі товари </a></p>

                              <?php else :?>
            <h4 class="h4">В кошику пусто</h4>
            <?php endif;?>
        </div>

        <div class="checkout container-fluid">
          <div class="row">
            <div class="col-xs-3 col-sm-2">
              <div>
                <p>знижка:</p>
                <h3 class="h5">Всього:</h3>
              </div>
            </div>
            <div class="col-xs-3 col-sm-4">
              <div class="total">
                  <p  style="text-decoration: line-through; color:red;"><?php echo $cartList['totalDiscount'];?><smal> грн</smal></p>
              <h3 class="h5"><?=$cartList['totalPrice']; ?> <smal> грн</smal></h3>
              </div>
            </div>

            <div class="col-xs-6 col-sm-6">
                <a class="btn btn-primary" href="/cabinet/"> Оформити замовлення </a>
            </div>
          </div>
        </div>
      </div>
    </div>