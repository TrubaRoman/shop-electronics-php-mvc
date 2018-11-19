

                        <div id="collapseExample">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row group">

                                    
                                    
                                        <div class="col-sm-4"><h2 class="h4">Виберіть місто</h2></div>
                                        <div class="col-sm-8">
                                          <!-- <input type="text" class="form-control" name="country" value="" required="" placeholder="" /> -->
                                            <form action="" method="post" name="addaddress">
                                                <div class="group-select justify" tabindex='1'>
                                                    <input class="form-control select" id="country" name="city" value="Місто" placeholder="" required="" />
                                              <?php if(is_array($cityes)):?>
                                              <ul class="dropdown">
                                                      <?php foreach ($cityes as $city):?>
                                                  <li data-value="<?=$city['city_name']?>" ><?=$city['city_name']; ?></li>
                                                      <?php endforeach;?>
                                              </ul>
                                              <?php endif;?>
                                              <div class="arrow bold"><i class="ion-chevron-down"></i></div>
                                          </div>
                                        </div>
                                    </div>

                                    <hr class="offset-sm">
                                    <div class="row">
                                      <div class="col-sm-4">
                                        <p>Вулиця</p>

                                        <input type="text" class="form-control input-sm" name="street" value="1" placeholder="" />
                                      </div>
                                      <div class="col-sm-4">
                                        <hr class="offset-sm visible-xs">
                                        <p>Дім</p>

                                        <input type="text" class="form-control input-sm" name="bulding" value="1"  placeholder="" />
                                      </div>
                                      <div class="col-sm-4">
                                        <hr class="offset-sm visible-xs">
                                        <p>Квартира</p>



                                        <input type="text" class="form-control input-sm" name="room" value="1"  placeholder="" />
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
