

<?php require_once ROOT.'/views/admin/layouts/admin_header.php';?>

<hr class="offset-md">

    <div class="box">
      <div class="container">
          <h2> <i class="ion-alert-circled" style="color: red;"></i> Ви дійсно бажаєте видалити товар? </h2>

      </div>
    </div>


    <div class="container">
         <div class="alert alert-danger"> <p class="warning">Після видалення товар повернути буде неможливо</p></div>
        <div class="row">
                       <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li> <a href="/backend/products/"> Головна адмін </a></li>
                    <li> <a href="/backend/products/page-1" > Список товарів </a></li>
                    <li class="active">  Видалення товару </a></li>

                </ol>

            </div>
            

                            <div class="col-lg-12">
                                <h4 class="h3"> <?=$productitem['name']; ?></h4>
                                <br>
                              <div class="menu ">
                            
                                  <form method="post">
                                      <input type="submit" class="btn btn-danger" name="delete" value="Видалити">
                                  </form>
                             
                              </div><!-- /input-group -->

                             
                            </div>
                                         
        </div>
    </div>
    <hr class="offset-lg">
    <hr class="offset-lg">

<?php require_once ROOT.'/views/admin/layouts/admin_footer.php';?>
