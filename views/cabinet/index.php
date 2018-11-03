      
      
<?php require_once(ROOT.'/views/layouts/header.php');?>      
      
      
      
    <hr class="offset-md">

    <div class="box">
      <div class="container">
          <h1>Оформити замовлення</h1>
      </div>
    </div>
    <hr class="offset-md">

    <div class="container">
      <div class="row">
          <div class="col-md-8">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="checkout">
                    <div class="addresses box-select">
                        <h2> 1. Оформіть адресу</h2>
                        <hr class="offset-sm">

                        <address class="box-default sm-padding" data-style="selected">
                            <hr class="offset-sm">

                            <h3 class="no-margin"><i class="ion-ios-person"></i> John Doe</h3>
                            <p>
                                <i class="ion-ios-location"></i> 100520, New York City, 45 Park Avenue, United States
                            </p>

                            <div class="check">
                                <i class="ion-checkmark-round"></i>
                            </div>
                            <hr class="offset-sm">
                        </address>

                        <address class="box-default sm-padding">
                            <hr class="offset-sm">
                            <h3 class="no-margin"><i class="ion-ios-person"></i> John Doe</h3>
                            <p>
                                <i class="ion-ios-location"></i> 100520, New York City, 45 Park Avenue, United States
                            </p>

                            <div class="check">
                                <i class="ion-checkmark-round"></i>
                            </div>
                            <hr class="offset-sm">
                        </address>

                        <hr class="offset-sm">
                        <a href="#addaddress" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                          Додати нову адресу
                        </a>
                        <hr class="offset-sm">
                        <div class="collapse" id="collapseExample">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row group">
                                        <div class="col-sm-4"><h2 class="h4">Виберіть місто</h2></div>
                                        <div class="col-sm-8">
                                          <!-- <input type="text" class="form-control" name="country" value="" required="" placeholder="" /> -->

                                          <div class="group-select justify" tabindex='1'>
                                              <input class="form-control select" id="country" name="country" value="United Kingdom" placeholder="" required="" />

                                              <ul class="dropdown">
                                                <li data-value="Aaland Islands">Aaland Islands</li>
                                                <li data-value="Afghanistan">Afghanistan</li>
                                                <li data-value="Albania">Albania</li>
                                           
                                                <li data-value="Ukraine">Ukraine</li>
                                                <li data-value="United Arab Emirates">United Arab Emirates</li>
                                                <li data-value="United Kingdom">United Kingdom</li>
                                                <li data-value=">United States">>United States</li>
                                                <li data-value="United States Minor Outlying Islands">United States Minor Outlying Islands</li>
                                                <li data-value="Uruguay">Uruguay</li>
                                                <li data-value="Uzbekistan">Uzbekistan</li>
                                                <li data-value="Vanuatu">Vanuatu</li>
                                                <li data-value="Vatican City State (Holy See)">Vatican City State (Holy See)</li>
                                                <li data-value="Venezuela">Venezuela</li>
                                                <li data-value="Viet Nam">Viet Nam</li>
                                                <li data-value="Virgin Islands (British)">Virgin Islands (British)</li>
                                                <li data-value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</li>
                                                <li data-value="Wallis and Futuna Islands">Wallis and Futuna Islands</li>
                                                <li data-value="Western Sahara">Western Sahara</li>
                                                <li data-value="Yemen">Yemen</li>
                                                <li data-value="Zambia">Zambia</li>
                                                <li data-value="Zimbabwe">Zimbabwe</li>
                                              </ul>

                                              <div class="arrow bold"><i class="ion-chevron-down"></i></div>
                                          </div>
                                        </div>
                                    </div>

                                    <hr class="offset-sm">
                                    <div class="row">
                                      <div class="col-sm-4">
                                        <p>Вулиця</p>

                                        <input type="text" class="form-control input-sm" name="city" value="" required="" placeholder="" />
                                      </div>
                                      <div class="col-sm-4">
                                        <hr class="offset-sm visible-xs">
                                        <p>Дім</p>

                                        <input type="text" class="form-control input-sm" name="street" value="" required="" placeholder="" />
                                      </div>
                                      <div class="col-sm-4">
                                        <hr class="offset-sm visible-xs">
                                        <p>Квартира</p>



                                        <input type="text" class="form-control input-sm" name="zip" value="" required="" placeholder="" />
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="checkbox">
                          <label>
                            <input type="checkbox" value="">
                            Використовувати як платіжну адресу
                          </label>
                        </div>

                        <hr class="offset-sm">
                        <hr>
                    </div>

                    <div class="delivery box-select">
                        <h2> 2. Спосіб доставки </h2>
                        <hr class="offset-sm">

                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="box-default sm-padding" data-style="selected">
                                    <hr class="offset-sm">
                                    <img src="../assets/img/shipping/fedex.jpg" title="fedex" alt="fedex" />
                                    <span>&nbsp;&nbsp;2-3 working days</span>
                                    <div class="check">
                                        <i class="ion-checkmark-round"></i>
                                    </div>
                                    <hr class="offset-sm">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box-default sm-padding">
                                    <hr class="offset-sm">
                                    <img src="../assets/img/shipping/dhl.jpg" title="dhl" alt="dhl" />
                                    <span>&nbsp;&nbsp;5-10 working days</span>
                                    <div class="check">
                                        <i class="ion-checkmark-round"></i>
                                    </div>
                                    <hr class="offset-sm">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box-default sm-padding">
                                    <hr class="offset-sm">
                                    <img src="../assets/img/shipping/ems.jpg" title="ems" alt="ems" />
                                    <span>&nbsp;&nbsp;5-10 working days</span>
                                    <div class="check">
                                        <i class="ion-checkmark-round"></i>
                                    </div>
                                    <hr class="offset-sm">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box-default sm-padding">
                                    <hr class="offset-sm">
                                    <img src="../assets/img/shipping/ups.jpg" title="ups" alt="ups" />
                                    <span>&nbsp;&nbsp;12-14 working days</span>
                                    <div class="check">
                                        <i class="ion-checkmark-round"></i>
                                    </div>
                                    <hr class="offset-sm">
                                </div>
                            </div>
                        </div>


                        <hr class="offset-sm">
                        <hr>
                    </div>

                    <div class="payment box-select">
                        <h2> 3. Оплата </h2>
                        <hr class="offset-sm">
                        
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="box-default sm-padding" data-style="selected">
                                    <hr class="offset-sm">
                                    <img src="../assets/img/payments/paypal.jpg" title="paypal" alt="paypal" />
                                    <span>&nbsp;&nbsp;0% Service fee</span>
                                    <div class="check">
                                        <i class="ion-checkmark-round"></i>
                                    </div>
                                    <hr class="offset-sm">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box-default sm-padding">
                                    <hr class="offset-sm">
                                    <img src="../assets/img/payments/stripe.jpg" title="stripe" alt="stripe" />
                                    <span>&nbsp;&nbsp;1% Service fee</span>
                                    <div class="check">
                                        <i class="ion-checkmark-round"></i>
                                    </div>
                                    <hr class="offset-sm">
                                </div>
                            </div>
                        </div>


                        <hr class="offset-sm">
                        <hr>
                    </div>

                    <div class="payment box-select">
                        <h2> 4. Коментарій </h2>
                        <hr class="offset-sm">

                        <textarea name="remark" class="form-control" placeholder="Please, type remark" rows="5"></textarea>
                        <hr class="offset-sm">
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-8 col-md-4">
            <hr class="offset-sm visible-sm">
              <div class="panel panel-default">
                <div class="panel-body">
                  <h2 class="no-margin">Summary</h2>
                  <hr class="offset-md">

                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-xs-6">
                              <p>Subtotal (7 items)</p>
                              <p>Discount</p>
                              <p>Delivery</p>
                          </div>
                          <div class="col-xs-6">
                              <p><b>$1499</b></p>
                              <p><b>$0</b></p>
                              <p><b>$0</b></p>
                          </div>
                      </div>
                  </div>

                  <div class="checkboxes">
                      <div class="radio">
                          <label>
                              <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                              Promotional Codes
                          </label>
                          <hr class="offset-xs">

                          <div class="input-group">
                            <input type="text" class="form-control input-sm" placeholder="Insert code">
                            <span class="input-group-btn">
                              <button class="btn btn-primary btn-sm" type="button">Apply</button>
                            </span>
                          </div><!-- /input-group -->
                          <hr class="offset-sm">
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                          Coupon
                        </label>
                      </div>
                  </div>
                  <hr>

                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-xs-6">
                              <h3 class="no-margin">Total sum</h3>
                          </div>
                          <div class="col-xs-6">
                              <h3 class="no-margin">$1499</h3>
                          </div>
                      </div>
                  </div>
                  <hr class="offset-md">

                  <button class="btn btn-primary btn-lg justify"><i class="ion-compose"></i>&nbsp;&nbsp; Confirm order</button>
                </div>
              </div>
          </div>
      </div>
    </div>
    <hr class="offset-lg">
    <hr class="offset-lg">
    <?php require_once(ROOT.'/views/layouts/footer.php');?>