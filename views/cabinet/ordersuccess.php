<?php require_once ROOT . '/views/layouts/header.php'; ?>
<hr class="offset-md">
<div class="box">
    <div class="container">
        <h1 class="success">Ваше замовлення відправлено!</h1>
        <h3 class="success sale ">Ми з вами звяжимось найблищим часом, Дякую!</h3>
        <hr class="offset-sm">
    </div>
</div>
<hr class="offset-md">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="checkout-cart">
                        <div class="content">
                            <?php if (isset($cartList['productInCart'])): ?>
                                <?php foreach ($cartList['products'] as $key => $itemProduct): ?>      

                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" src="../assets/img/products/chrome-book-11.jpg" alt="HP Chromebook 11"/>
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h2 class="h4 media-heading"><?= ($itemProduct['name']) ? $itemProduct['name'] : ' Товарів у кошику немає '; ?></h2>
                                            <label><?= ($itemProduct['brand']) ?? ''; ?></label>
                                            <p class="price"><?= $itemProduct['price']; ?><small> грн</small></p>
                                            <p class="price through" style="text-decoration: line-through; color:red;"> <?= ($itemProduct['discount'] != 0) ? $itemProduct['discount'] . '<small>грн</small>' : ''; ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <h2 class="no-margin">Товарів на суму</h2>
                                        <hr class="offset-md">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <h4 class="no-margin">Сума зі знижкою</h4>
                                                </div>
                                                <div class="col-xs-6">
                                                    <h3 class="no-margin"><?php echo ($cartList['totalPrice']) ?? '0'; ?><smal> грн</smal></h3>
                                                </div>
                                                <div class="col-xs-6">
                                                    <h4 class="no-margin">Знижка</h4>
                                                </div>
                                                <div class="col-xs-6 product">
                                                    <h3 class="no-margin" style="text-decoration: line-through; color:red;"><?php echo ($cartList['totalDiscount']) ?? '0'; ?><smal> грн</smal></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <p class="h4">Кількість товарів (<?= Cart::countItem(); ?>)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <a href="/" <?php Cart::clearCart(); ?>> <i class="ion-home"></i> На головну </a>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

<hr class="offset-lg">
<?php require_once ROOT . '/views/layouts/footer.php'; ?>
