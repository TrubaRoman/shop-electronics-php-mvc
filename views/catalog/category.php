<?php require_once ROOT.'/views/layouts/cart.php';?>
<?php require_once ROOT.'/views/layouts/header.php';?>
    <hr class="offset-lg">

    <div class="container tags">
        <div class="btn-group pull-right">
          <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ion-arrow-down-b"></i> Sorting by name
          </button>
          <ul class="dropdown-menu">
            <li class="active"><a href="#"> <i class="ion-arrow-down-c"></i> Name [A-Z]</a></li>
            <li><a href="#"> <i class="ion-arrow-up-c"></i> Name [Z-A]</a></li>
            <li><a href="#"> <i class="ion-arrow-down-c"></i> Price [Low-High]</a></li>
            <li><a href="#"> <i class="ion-arrow-up-c"></i> Price [High-Low]</a></li>
          </ul>
        </div>

        <p>Бренд:</p>
        <div class="btn-group" >
            <?php foreach ($categoryList as $categorItem):?>
          <label class="btn btn-default btn-xs <?=($categorItem['id'] == $categoryId)?'active':'';?>">
              <a href="/category/<?=$categorItem['id']?>"><?=$categorItem['name']; ?></a>
          </label>
            <?php endforeach;?>
        </div>
    </div>


    <div class="container">
      <div class="row">
        <!-- Filter -->
        <div class="col-sm-3 filter">
          <div class="item">
              <div class="title">
                  <a href="#clear" data-action="open" class="down"> <i class="ion-android-arrow-dropdown"></i> Open</a>
                  <a href="#clear" data-action="clear"> <i class="ion-ios-trash-outline"></i> Clear</a>
                  <h1 class="h4">Type</h1>
              </div>

              <div class="controls">
                <div class="checkbox-group" data-status="inactive">
                    <div class="checkbox"><i class="ion-android-done"></i></div>
                    <div class="label" data-value="Laptops">Laptops</div>
                    <input type="checkbox" name="checkbox" value="">
                </div>

                <div class="checkbox-group" data-status="inactive">
                    <div class="checkbox"><i class="ion-android-done"></i></div>
                    <div class="label" data-value="Tablets">Tablets</div>
                    <input type="checkbox" name="checkbox" value="">
                </div>

                <div class="checkbox-group" data-status="inactive">
                    <div class="checkbox"><i class="ion-android-done"></i></div>
                     <div class="label" data-value="Hybrid">Hybrids</div>
                    <input type="checkbox" name="checkbox" value="">
                </div>
              </div>
          </div>

          <br>

          <div class="item">
              <div class="title">
                  <a href="#clear" data-action="open" class="down"> <i class="ion-android-arrow-dropdown"></i> Open</a>
                  <a href="#clear" data-action="clear"> <i class="ion-ios-trash-outline"></i> Clear</a>
                  <h1 class="h4">Screen</h1>
              </div>

              <div class="controls grid">
                <div class="checkbox-group" data-status="inactive">
                    <div class="checkbox"><i class="ion-android-done"></i></div>
                    <div class="label" data-value="7 in">7 in</div>
                    <input type="checkbox" name="checkbox" value="">
                </div>

                <div class="checkbox-group" data-status="inactive">
                    <div class="checkbox"><i class="ion-android-done"></i></div>
                    <div class="label" data-value="10 in">10 in</div>
                    <input type="checkbox" name="checkbox" value="">
                </div>

                <div class="checkbox-group" data-status="inactive">
                    <div class="checkbox"><i class="ion-android-done"></i></div>
                     <div class="label" data-value="11 in">11 in</div>
                    <input type="checkbox" name="checkbox" value="">
                </div>

                <div class="checkbox-group" data-status="inactive">
                    <div class="checkbox"><i class="ion-android-done"></i></div>
                    <div class="label" data-value="14 in">14 in</div>
                    <input type="checkbox" name="checkbox" value="">
                </div>

                <div class="checkbox-group" data-status="inactive">
                    <div class="checkbox"><i class="ion-android-done"></i></div>
                    <div class="label" data-value="15 in">15 in</div>
                    <input type="checkbox" name="checkbox" value="">
                </div>

                <div class="checkbox-group" data-status="inactive">
                    <div class="checkbox"><i class="ion-android-done"></i></div>
                     <div class="label" data-value="17 in">17 in</div>
                    <input type="checkbox" name="checkbox" value="">
                </div>
              </div>
          </div>

          <br>

          <div class="item">
            <div class="title">
                <a href="#clear" data-action="open" class="down"> <i class="ion-android-arrow-dropdown"></i> Open</a>
                <a href="#clear" data-action="clear-price"> <i class="ion-ios-trash-outline"></i> Clear</a>
                <h1 class="h4">Price</h1>
            </div>

            <div class="controls">
                <br>
                <div id="slider-price"></div>
                <br>
                <p id="amount"></p>
            </div>
          </div>
          <br>

          <div class="item lite">
              <div class="title">
                  <a href="#clear" data-action="open" class="down"> <i class="ion-android-arrow-dropdown"></i> Open</a>
                  <a href="#clear" data-action="clear"> <i class="ion-ios-trash-outline"></i> Clear</a>
                  <h1 class="h4">Manufacturer</h1>
              </div>

              <div class="controls">
                <div class="checkbox-group" data-status="inactive">
                    <div class="checkbox"><i class="ion-android-done"></i></div>
                    <div class="label" data-value="Hp">Hp</div>
                    <input type="checkbox" name="checkbox" value="">
                </div>

                <div class="checkbox-group" data-status="inactive">
                    <div class="checkbox"><i class="ion-android-done"></i></div>
                    <div class="label" data-value="ASUS">ASUS</div>
                    <input type="checkbox" name="checkbox" value="">
                </div>

                <div class="checkbox-group" data-status="inactive">
                    <div class="checkbox"><i class="ion-android-done"></i></div>
                     <div class="label" data-value="Acer">Acer</div>
                    <input type="checkbox" name="checkbox" value="">
                </div>

                <div class="checkbox-group" data-status="inactive">
                    <div class="checkbox"><i class="ion-android-done"></i></div>
                     <div class="label" data-value="Dell">Dell</div>
                    <input type="checkbox" name="checkbox" value="">
                </div>

                <div class="checkbox-group" data-status="inactive">
                    <div class="checkbox"><i class="ion-android-done"></i></div>
                     <div class="label" data-value="Sony">Sony</div>
                    <input type="checkbox" name="checkbox" value="">
                </div>

                <div class="checkbox-group" data-status="inactive">
                    <div class="checkbox"><i class="ion-android-done"></i></div>
                     <div class="label" data-value="Apple">Apple</div>
                    <input type="checkbox" name="checkbox" value="">
                </div>

                <div class="checkbox-group" data-status="inactive">
                    <div class="checkbox"><i class="ion-android-done"></i></div>
                     <div class="label" data-value="Lenovo">Lenovo</div>
                    <input type="checkbox" name="checkbox" value="">
                </div>

                <div class="checkbox-group" data-status="inactive">
                    <div class="checkbox"><i class="ion-android-done"></i></div>
                     <div class="label" data-value="Microsoft">Microsoft</div>
                    <input type="checkbox" name="checkbox" value="">
                </div>
              </div>
          </div>
        </div>
        <!-- /// -->

        <!-- Products -->
        <div class="col-sm-9 products">
          <div class="row">

              <?php foreach ($categoryProducts as $Item):?>
            <div class="col-sm-6 col-md-4 product">
              <a href="#favorites" class="favorites" data-favorite="inactive"><i class="ion-ios-heart-outline"></i></a>
              <a href="./"><img src="/assets/img/products/chrome-book-11.jpg" alt="HP Chromebook 11"/></a>

              <div class="content">
                <div style="min-height:70px;">
                <h1 class="h5"><?=$Item['name']; ?></h1>
                </div>
                <p class="price"><?=$Item['price'];?><small> грн</small></p>

                    <p class="price through"> <?= ($Item['discount'] != 0) ? $Item['discount'] . '<small>грн</small>' : ''; ?></p>
                    <label><?= $Item['brand']; ?></label>

                    <a href="/product/<?= $Item['id']; ?>" class="btn btn-link"> Детально</a>
                    <a href="/cart/add/<?= $Item['id']; ?>" style="all:none;">
                        <button class="btn btn-primary btn-rounded btn-sm" > 
                            <i class="ion-bag"></i> В кошик</button></a>
                  </div>
                </div>
            <?php endforeach; ?>




          </div>

          <nav>
                <?php echo $pagination->get();?>
          </nav>
        </div>
        <!-- /// -->
      </div>
    </div>
    <br><br>
<?php require_once ROOT.'/views/layouts/footer.php';?>