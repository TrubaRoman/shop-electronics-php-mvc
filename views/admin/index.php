

<?php require_once ROOT.'/views/admin/layouts/admin_header.php';?>

<hr class="offset-md">

    <div class="box">
      <div class="container">
          <h1> <i class="ion-gear-a" style="color: green;"></i> Панель Адміністратора </h1>

      </div>
    </div>


    <div class="container">
        <div class="row">
            <h4 class="h3">Вам доступні такі можливості:</h4>
                            <div class="col-lg-12">
                              <div class="menu ">
                            
                             <p> <a href="/backend/products/page-1"> <i class="ion-bag"></i> &nbsp; Управління товарами  </a></p>
                             <p> <a href="/backend/category"> <i class="ion-ios-list-outline"></i>&nbsp; Управління категоріями  </a></p>
                             <p><a href="/backend/orders"> <i class="ion-cash"></i> &nbsp;Управління замовленнями </a></p>
                             <p> <a href="/backend/users"> <i class="ion-ios-people-outline"></i>&nbsp; Управління користувачами</a></p>

                              </div><!-- /input-group -->

                            </div>
        </div>
    </div>
    <hr class="offset-lg">
    <hr class="offset-lg">

<?php require_once ROOT.'/views/admin/layouts/admin_footer.php';?>
