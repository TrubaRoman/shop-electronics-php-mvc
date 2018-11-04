<?php require_once(ROOT.'/views/layouts/header.php');?>
    <hr class="offset-lg">

    <div class="product">
    	<div class="container">
        <div class="row">
          <div class="col-sm-7 col-md-7">
            <div class="carousel product" data-count="5" data-current="1">
              <!-- <button class="btn btn-control"></button> -->

              <div class="items">
                <div class="item active" data-marker="1">
                  <img src="/assets/img/product/1.jpg" alt="ChromeBook 11"/>
                </div>
                <div class="item" data-marker="2">
                  <img src="/assets/img/product/2.jpg" alt="ChromeBook 11"/>
                </div>
                <div class="item" data-marker="3">
                  <img src="/assets/img/product/3.jpg" alt="ChromeBook 11"/>
                </div>
                <div class="item" data-marker="4">
                  <img src="/assets/img/product/4.jpg" alt="ChromeBook 11"/>
                </div>
                <div class="item" data-marker="5">
                  <img src="/assets/img/product/5.jpg" alt="ChromeBook 11"/>
                </div>
                <div class="item" data-marker="6">
                  <div class="tiles">
                    <a href="#video" data-gallery="#video" data-source="youtube" data-id="hED0N4CFoqs" data-title="An upscale new Chromebook from HP" data-description="The new HP Chromebook 13 runs a Core M CPU inside a slim aluminum body.">
                      <img src="/assets/img/product/video.jpg" alt="ChromeBook 11">

                      <div class="overlay"></div>
                      <div class="content">
                        <div class="content-outside">
                          <div class="content-inside">
                            <i class="ion-ios-play"></i>
                            <h1>Watch video review</h1>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>

              <ul class="markers">
                <li data-marker="1" class="active"><img src="/assets/img/product/1.jpg" alt="Background"/></li>
                <li data-marker="2"><img src="/assets/img/product/2.jpg" alt="Background"/></li>
                <li data-marker="3"><img src="/assets/img/product/3.jpg" alt="Background"/></li>
                <li data-marker="4"><img src="/assets/img/product/4.jpg" alt="Background"/></li>
                <li data-marker="5"><img src="/assets/img/product/5.jpg" alt="Background"/></li>
                <li data-marker="6"><img src="/assets/img/product/video.jpg" alt="Background"/></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-5 col-md-5">
            <img src="/assets/img/brands/hp.png" alt="HP" class="brand hidden-xs" />
            <h1><?= $prodctItem['name'];?></h1>

            <p> <small>діагональ:</small> <?= $specificationsProduct['diagonal']; ?></p>
            <p> <?= $specificationsProduct['processor']; ?></p>
           
            <p> <?= $specificationsProduct['graphics']; ?></p>

            <p class="price"><?=$prodctItem['price']; ?></p>
            <p class="price through"> <?=($prodctItem['discount'] != 0)? $prodctItem['discount'].'<small>грн</small>':''; ?></p>
            <br><br>

            <button class="btn btn-primary btn-rounded" data-id="<?php echo $prodctItem['id'];?>"> <i class="ion-bag"></i> В кошик</button>
                    </a>
          </div>
        </div>
    		<br><br><br>


	    	<div class="row">
	    		<div class="col-sm-7">
                                <h1><?=$prodctItem['name']; ?></h1>
		    		 <br>

		    		 <p>
		    		 	<?=$prodctItem['description']; ?>
		    		 </p>
		    		 <br>

             <h2>Характеристика</h2>
             <br>
              <div class="row specification">
                <div class="col-sm-6"> <label>Екран</label> </div>
                <div class="col-sm-6"> <p><?= $specificationsProduct['diagonal']; ?></p> </div>
              </div>
             
              <div class="row specification">
                <div class="col-sm-6"> <label>Операційна система</label> </div>
                <div class="col-sm-6"> <p><?= $specificationsProduct['operating_system']; ?></p> </div>
              </div>
              
              <div class="row specification">
                <div class="col-sm-6"> <label>Процесор</label> </div>
                <div class="col-sm-6"> <p><?= $specificationsProduct['processor']; ?></p> </div>
              </div>


              <div class="row specification">
                <div class="col-sm-6"> <label>Графіка</label> </div>
                <div class="col-sm-6"> <p><?= $specificationsProduct['graphics']; ?></p> </div>
              </div>

              <div class="row specification">
                <div class="col-sm-6"> <label>Оперативна память</label> </div>
                <div class="col-sm-6"> <p><?= $specificationsProduct['memory']; ?></p> </div>
              </div>

              <div class="row specification">
                <div class="col-sm-6"> <label>Жорсткий диск</label> </div>
                <div class="col-sm-6"> <p><?= $specificationsProduct['hard']; ?></p> </div>
              </div>

              <div class="row specification">
                <div class="col-sm-6"> <label>Порти і розйоми</label> </div>
                <div class="col-sm-6"> <p><?= $specificationsProduct['wireless']; ?></p> </div>
              </div>

              <div class="row specification">
                <div class="col-sm-6"> <label>Батарея</label> </div>
                <div class="col-sm-6"> <p><?=$specificationsProduct['battery']; ?></p> </div>
              </div>

              <div class="row specification">
                <div class="col-sm-6"> <label>Додатково</label> </div>
                <div class="col-sm-6"> <p><?=$specificationsProduct['/assets']; ?></p> </div>
              </div>

          </div>
          <div class="col-sm-5">
            <div class="comments">
              <h2 class="h3">What do you think? (#3)</h2>
              <br>


              <div class="wrapper">
                <div class="content">
                  <h3>Anne Hathaway</h3>
                  <label>2 years ago</label>
                  <p>
                    Apple Music brings iTunes music streaming to the UK. But is it worth paying for? In our Apple Music review, we examine the service's features, UK pricing, audio quality and music library
                  </p>


                  <h3>Chris Hemsworth</h3>
                  <label>Today</label>
                  <p>
                    Samsung's Galaxy S7 smartphone is getting serious hype. Here's what it does better than Apple's iPhone 6s.
                  </p>


                  <h3>Anne Hathaway</h3>
                  <label>2 years ago</label>
                  <p>
                    Apple Music brings iTunes music streaming to the UK. But is it worth paying for? In our Apple Music review, we examine the service's features, UK pricing, audio quality and music library
                  </p>
                </div>
              </div>
              <br>

              <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#Modal-Comment"> <i class="ion-chatbox-working"></i> Add comment </button>
            </div>
            <br><br>

            <div class="talk">
              <h2 class="h3">Do you have any questions?</h2>
              <p>Online chat with our manager</p>

              <button class="btn btn-default btn-sm"> <i class="ion-android-contact"></i> Lat's talk </button>
            </div>
	    		</div>
	    	</div>
    	</div>
    </div>
    <br><br>

    <section class="products">
        <div class="container">
            <h1 class="h3">Рекомендовані товари</h1>
           
            <div class="row">
                 <?php foreach ($recommendedProduct as $recommendedItem):?>
              <div class="col-sm-6 col-md-3 product">
                <a href="#favorites" class="favorites" data-favorite="inactive"><i class="ion-ios-heart-outline"></i></a>
                <a href="./"><img src="/assets/img/products/ipad-air.jpg" alt="iPad Air"/></a>

                <div class="content">
                    <div style="min-height:100px;">
                    <h1 class="h4"><?=$recommendedItem['name']; ?></h1>
                    </div>
                    <p class="price"><?=$recommendedItem['price']; ?></p>
                     <p class="price through">
         <?=($recommendedItem['discount'] != 0)? $recommendedItem['discount'].'<small>грн</small>':''; ?></p>
                  <label><?=$recommendedItem['brand']; ?></label>

                  <a href="/product/<?=$recommendedItem['id']; ?>" class="btn btn-link"> Детальніше</a>
                  <button class="btn btn-primary btn-rounded btn-sm"> <i class="ion-bag"></i> Добавити в кошик</button>
                </div>
              </div>
                   <?php endforeach;?>
            </div>
         
        </div>
    </section>
    <br><br>
    <?php require_once(ROOT.'/views/layouts/footer.php');?>
