<?php require_once ROOT . '/views/admin/layouts/admin_header.php'; ?>

<hr class="offset-lg hidden-xs">
<hr class="offset-md">

<div class="container">
    <div class="row">

        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li> <a href="/backend/products/"> Головна адмін </a></li>
                <li class="active">  Добавити товар крок 1 </li>

            </ol>

        </div>
        <div class="col-sm-12  col-md-12 md-padding">
            <h1 class="align-center">Новий товар</h1>
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
                                <label for="">Назва товару </label>
                                <input type="text" name="name" value="<?=($options['name'])??''; ?>" placeholder="Назва товару" required="" class="form-control" /><br>
                            </div>
                            <div class="col-sm-11">
                                <label for="">Код товару </label>
                                <input type="text" name="code" value="<?=($options['code'])??''; ?>" placeholder="код товару" required="" class="form-control"   /><br>
                            </div>
                            <div class="col-sm-11">
                                <label for="">Ціна товару </label>                    
                                <input type="text" name="price" value="<?=($options['price'])??''; ?>" placeholder="вартість" required="" class="form-control"  /><br>
                            </div>
                            <div class="col-sm-11">
                                <label for="">Знижка на товар </label>                    
                                <input type="text" name="discount" value="<?= ($options['discount'])??''; ?>" placeholder="Знижка" class="form-control"  /><br>
                            </div>
                            <div class="col-sm-11">
                                <label for="">Категорія товару </label>                    
                                <select name="category_id" class="form-control" id="">
                                    <?php if (is_array($categoryList)): ?> 
                                        <?php foreach ($categoryList as $categoryitem): ?>
                                            <option class="select" value="<?= $categoryitem['id']; ?>">
                                                <?= $categoryitem['name']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select></br>
                            </div>
                            <div class="col-sm-11">
                                <label for="file">Зображення </label>
                                <input type="file" name="image" value="" placeholder="зображення" class="form-control-file"   /><br>
                            </div>
                        </div>
                        <!-------->
                        <div class="col-lg-6">
                            <div class="col-sm-11">
                                <label for="">Бренд </label>
                                <input type="text" name="brand" value="" placeholder="виробник" required="" class="form-control" /><br>
                            </div>

                            <div class="col-sm-11">
                                <label for="">Показувати </label>                    
                                <select name="status" class="form-control" id="">
                                    <option value="1" selected="">Так</option>
                                    <option value="0">Ні</option>
                                </select><br>
                            </div>
                            <div class="col-sm-11">
                                <label for="">Новий </label>                    
                                <select name="is_new" class="form-control" id="">
                                    <option value="1" selected="">Так</option>
                                    <option value="0">Ні</option>
                                </select><br>
                            </div>
                            <div class="col-sm-11">
                                <label for="">Рекомендований </label>                    
                                <select name="is_recommended" class="form-control" id="">
                                    <option value="1" selected="">Так</option>
                                    <option value="0">Ні</option>
                                </select><br>
                            </div>
                            <div class="col-sm-11">
                                <label for="">Опис товару </label>                    
                                <textarea name="description" value="<?=($options['description'])??''; ?>" placeholder="опис" class="form-control"></textarea><br>
                            </div>

                        </div>
                    </div>

                </div>
                <br>

                <button type="submit" value="save_products"  class="btn btn-primary">Зберегти основні дані</button>


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