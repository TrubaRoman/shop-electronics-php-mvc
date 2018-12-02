<?php require_once ROOT . '/views/admin/layouts/admin_header.php'; ?>

<hr class="offset-lg hidden-xs">
<hr class="offset-md">

<div class="container">
    <div class="row">

        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li> <a href="/backend/products/"> Головна адмін </a></li>
                <li> <a href="/backend/products/create/<?=$id; ?>"> Добавити товар крок 1 </a></li>
                <li class="active">  Добавити товар крок 2 ( тех Характеристики) </li>

            </ol>

        </div>
        <div class="col-sm-12  col-md-12 md-padding">
            <h1 class="align-center"><i class="ion-wrench" style="color: green;"></i>  Технічні характеристики</h1>
            <h3 class="align-center ">   <?=$product['name']; ?></h3>
            <br>
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

                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <form class="join"  method="post">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="col-sm-11">
                                <label for="">Monitor </label>
                                <input type="text" name="diagonal" value="<?=($specification['diagonal'])??''; ?>" placeholder="Діагональ" required="" class="form-control" /><br>
                            </div>
                            <div class="col-sm-11">
                                <label for="">Операційна система </label>
                                <input type="text" name="operating_system" value="<?=($specification['operating_system'])??''; ?>" placeholder="Назва ОС" required="" class="form-control" /><br>
                            </div>
                           
                            <div class="col-sm-11">
                                <label for="">Просесор </label>
                                <input type="text" name="processor" value="<?=($specification['processor'])??''; ?>" placeholder="Процесор" required="" class="form-control" /><br>
                            </div>
                            <div class="col-sm-11">
                                <label for="">Відеокарта </label>
                                <input type="text" name="graphics" value="<?=($specification['graphics'])??''; ?>" placeholder="Відеокарта" required="" class="form-control" /><br>
                            </div>
                            <div class="col-sm-11">
                                <label for="">Оперативна пам'ять </label>
                                <input type="text" name="memory" value="<?=($specification['memory'])??''; ?>" placeholder="Оперативна пам'ять" required="" class="form-control" /><br>
                            </div>
                           

                        <!-------->

                    </div>
                                                <div class="col-lg-6">
                            <div class="col-sm-11">
                                <label for="">Жосткий диск </label>
                                <input type="text" name="hard" value="<?=($specification['hard'])??''; ?>" placeholder="Жосткий диск" required="" class="form-control" /><br>
                            </div>
                            <div class="col-sm-11">
                                <label for="">Батарея </label>
                                <input type="text" name="battery" value="<?=($specification['battery'])??''; ?>" placeholder="Акумулятор" required="" class="form-control" /><br>
                            </div>

                            <div class="col-sm-11">
                                <label for="">Комутаційні пристрої </label>                    
                                <textarea name="wireless" value="<?=($specification['wireless'])??''; ?>" placeholder="Порти, комутації" class="form-control"></textarea><br>
                            </div>
                            <div class="col-sm-11">
                                <label for="">Інше </label>                    
                                <textarea name="additionally" value="<?=($specification['additionally'])??''; ?>" placeholder="Інше" class="form-control"></textarea><br>
                            </div>

                        </div>

                </div>
                <br>

                <button type="submit" value="save_specification"  class="btn btn-primary">Зберегти  характеристики</button>


                <br><br>
                <p>
                
                </p>
            </form>

            <br class="hidden-sm hidden-md hidden-lg">
        </div>
    </div>
</div>
<br><br>
<hr class="hidden-xs">
<br class="hidden-xs">
<br class="hidden-xs">
<?php require_once ROOT . '/views/admin/layouts/admin_footer.php'; ?>