<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Test site shop</title>

    <meta name="description" content="Bootstrap template for you store - E-Commerce Bootstrap Template">
    <meta name="keywords" content="unistore, e-commerce bootstrap template, premium e-commerce bootstrap template, premium bootstrap template, bootstrap template, e-commerce, bootstrap template, sunrise digital">
    <meta name="author" content="Sunrise Digital">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png">

    <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/custom.css" rel="stylesheet">
    <link href="/assets/css/carousel.css" rel="stylesheet">
    <link href="/assets/css/carousel-recommendation.css" rel="stylesheet">
    <link href="/assets/ionicons-2.0.1/css/ionicons.css" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link href='https://fonts.googleapis.com/css?family=Catamaran:400,100,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <p class="h5" style="color:red;"> This site is a test and does not contain true information after a certain period it will be deleted</p>
      <?php require_once ROOT.'/views/layouts/cart.php';?>
    <nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./"> <i class="ion-cube"></i> Unistore</a>
          </div>

          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="/">Home</a></li>

              <li class="dropdown">
                <a href="./catalog/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Категорії <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Бренди</li>
                  <li role="separator" class="divider"></li>
                  <?php foreach (Category::getCategoryList() as $categorItem):?>
                  <li><a href="/category/<?=$categorItem['id'];?>"><?=$categorItem['name']; ?></a></li>
                  <?php endforeach;?>
         </ul>
              </li>
              <li><a href="/catalog/">Catalog</a></li>
              <li><a href="/blog/">Blog</a></li>
              <li><a href="/gallery/">Gallery</a></li>
              <li class="dropdown">
                <a href="/catalog/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="./catalog/product.html">Product</a></li>
                  <li><a href="/cart/">Cart</a></li>
                  <li><a href="./checkout/">Checkout</a></li>
                  <li><a href="./faq/">FAQ</a></li>
                  <li><a href="/contacts/">Contacts</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Variations</li>
                  <li><a href="./home">Home</a></li>
                  <li><a href="./blog/item-photo.html">Article Photo</a></li>
                  <li><a href="./blog/item-video.html">Article Video</a></li>
                  <li><a href="./blog/item-review.html">Article Review</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (User::isGuest()):?>
              <li><a href="/login/"> <i class="ion-log-in"></i> Вхід </a></li>
              <li><a href="/signup/"><i class="ion-android-person-add "></i> Реєстрація</a></li>
                  
                  <?php else :?>
              
                            <li><a href="/logout/"> <i class="ion-log-out"></i> Вихід  </a></li>
                            <li><a href="/cabinet/edit"> <i class="ion-android-options"></i> Редагувати дані  </a></li>
                <?php endif;?>        
                            <li><a href="/cart/"> <i class="ion-bag"></i>
                                    <span id="cart-count"> <?php echo 'Кошик '.Cart::countItem();?></span></a>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>
