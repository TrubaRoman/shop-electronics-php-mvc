

<?php require_once ROOT.'/views/admin/layouts/admin_header.php';?>

<hr class="offset-md">

    <div class="box">
      <div class="container">
          <h1> <i class="ion-ios-gear-outline" style="color: green;"></i> Конфігурації товару </h1>
          


      </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li> <a href="/backend/products/"> Головна адмін </a></li>
                    <li class="active">  Конфігурації </li>

                </ol>

            </div>

                            <div class="col-lg-12">
                                <?php  if(is_array($specificationlist)):?>
                              <div class="menu ">
                                  <a href="/specification/update/<?=$specificationlist['product_id']; ?>" class=" btn btn-primary"> <i class="ion-android-add"></i>  Редагувати  </a>   
                            <br>
                            <br>
 
                              </div><!-- /input-group -->
                              <table class="table-bordered table-striped table">
                                  <tbody>          <h3 class="align-center"> <i class="ion-bag" style="color: green;"></i>  <?=$product['name']; ?></h3></tbody>

                                  <tr>
                                  <th>ID Товару</th>
                                  <td><?=$specificationlist['product_id']; ?></td>
                                  </tr>
                                  <tr>
                                  <th>Монітор</th>
                                  <td><?=$specificationlist['diagonal']; ?></td>
                                  </tr>
                                  <tr>
                                  <th>Операційна система</th>
                                   <td><?=$specificationlist['operating_system']; ?></td>
                                  </tr>
                                   <tr>
                                  <th>Просесор</th>
                                   <td><?=$specificationlist['processor']; ?></td>                                  
                                   </tr>
                                   <tr>
                                  <th>Відеокарта</th>
                                  <td><?=$specificationlist['graphics']; ?></td>
                                   </tr>
                                   <tr>
                                  <th>Оперативна пам'ять</th>
                                  <td><?=$specificationlist['memory']; ?></td>
                                   </tr>                             
                                   <tr>
                                  <th>Жосткий диск</th>
                                  <td><?=$specificationlist['hard']; ?></td>
                                   </tr>                             
                                   <tr>
                                  <th>Порти / комунікації</th>
                                  <td><?=$specificationlist['wireless']; ?></td>
                                   </tr>                             
                                   <tr>
                                  <th>Батарея</th>
                                  <td><?=$specificationlist['battery']; ?></td>
                                   </tr>                             
                                   <tr>
                                  <th>Додатково</th>
                                  <td><?=$specificationlist['additionally']; ?></td>
                                   </tr>                             
      
                         

                                  
                                  
                                      
                                    
                                  
                                  <?php endif;?>
                              </table>
                            </div>
        </div>
                   
    </div>
    <hr class="offset-lg">
    <hr class="offset-lg">

<?php require_once ROOT.'/views/admin/layouts/admin_footer.php';?>
