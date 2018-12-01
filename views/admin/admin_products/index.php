

<?php require_once ROOT.'/views/admin/layouts/admin_header.php';?>

<hr class="offset-md">

    <div class="box">
      <div class="container">
          <h1> <i class="ion-bag" style="color: green;"></i> Список товарів </h1>

      </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="breadcrumb">
                <ol class="breadcrumb">
                    <li> <a href="/backend/products/"> Головна адмін </a></li>
                    <li class="active"> <a href="/backend/products/page-1" > Список товарів </a></li>

                </ol>

            </div>

                            <div class="col-lg-12">
                              <div class="menu ">
                                  <a href="/backend/products/create" class=" btn btn-primary"> <i class="ion-android-add"></i>  Добавити товар </a>   
                            <br>
                            <br>
 
                              </div><!-- /input-group -->
                              <table class="table-bordered table-striped table">

                                  <tr>
                                  <th>ID Товару</th>
                                  <th>Товар</th>
                                  <th>Код</th>
                                  <th>Бренд</th>
                                  <th>Прайс</th>
                                  <th>Скидка</th>
                                  <th></th>
                                  <th></th>
                                  </tr>
                                  <?php foreach ($productsList as $products):?>
                                  
                                  <tr>
                                      <td><?=$products['id']; ?></td>
                                      <td><?=$products['name']; ?></td>
                                      <td><?=$products['code']; ?></td>
                                      <td><?=$products['brand']; ?></td>
                                      <td><?=$products['price']; ?></td>
                                      <td><?=($products['discount'])??''; ?></td>
                                      <td><a href="/backend/products/update/<?=$products['id']; ?>"><i class="ion-ios-refresh-empty"></i></a></td>
                                      <td><a href="/backend/products/delete/<?=$products['id']; ?>"><i class="ion-ios-trash-outline"></i></a></td>
                                  </tr>
                                  <?php endforeach;?>
                              </table>
                            </div>
        </div>
                        <?php echo $pagination->get();?>
    </div>
    <hr class="offset-lg">
    <hr class="offset-lg">

<?php require_once ROOT.'/views/admin/layouts/admin_footer.php';?>
