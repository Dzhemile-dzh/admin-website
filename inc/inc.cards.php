        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <? 
                  if (isset($current_we_id) && $current_we_id > 0){
                    echo ('<div class="mr-5"><a href="?page=website&edit=1" style="color:#FFF;">+ EDIT WEBSITE</a></div>');
                    echo ('<div class="mr-5"><a href="?page=top-positions&edit=1" style="color:#FFF;">+ EDIT TOP POSITIONS </a></div>');
                  }else{
                    echo ('<div class="mr-5"><a href="?page=website" style="color:#FFF;">+ ADD WEBSITE</a></div>');
                  }
                ?>
              </div>
              
              <a class="card-footer text-white clearfix small z-1" href="?page=website-all">
                <span class="float-left">All Websites</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <? 
                if (isset($current_we_id) && $current_we_id > 0){ ?>
                  <div class="mr-5"><a href="?page=content" style="color:#FFF;">+ ADD CONTENT</a>               
                    <form name="change_content" method="GET"><input type="hidden" name="page" value="content">
                        <div class="input-group-append">
                          <select name="edit" onchange="this.form.submit()" class="form-control" style="width:210px;">
                            <option value="0">Select Content To Edit...</option> 
                          <?
                              foreach ($contents as $content_edit){ 
                              echo ('<option value="'.$content_edit->wc_id.'">'.$content_edit->wc_title.'</option>');?>
                          <? } ?>
                          </select>
                        </div>
                   </form>
                  <div class="mr-5"><a href="?page=game" style="color:#FFF;">+ ADD GAME</a>
                    <form name="change_content" method="GET"><input type="hidden" name="page" value="game">
                        <div class="input-group-append">
                          <select name="edit" onchange="this.form.submit()" class="form-control" style="width:210px;">
                            <option value="0">Select Game To Edit...</option> 
                          <?
                              foreach ($games as $game){ 
                              echo ('<option value="'.$game->gm_id.'">'.$game->gm_title.'</option>');?>
                          <? } ?>
                          </select>
                        </div>
                   </form>              
                  </div>
                </div> 
                <? }else { echo ('<div class="mr-5"><a href="?page=content-all" style="color:#FFF;">VIEW ALL CONTENTS</a></div>');} ?>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="?page=content-all">
                <span class="float-left">View All Contents</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

          <? if (!isset($website)){?>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-dark o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-cat"></i>
                </div>
                <div class="mr-5"><a href="?page=brand-offers" style="color:#FFF;">+ ADD BRAND OFFER</a>
                  <form name="change_affiliate" method="GET"><input type="hidden" name="page" value="brand-offers">
                    <div class="input-group-append">
                      <select name="edit" onchange="this.form.submit()" class="form-control" style="width:210px;">
                        <option value="0">Select Brand To Edit...</option> 
                          <? foreach ($offers as $offer) {echo ('<option value="'.$offer->bo_id.'">'.$offer->ab_brand_name.'</option>'); }?>
                      </select>
                    </div>
                  </form>
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="?page=brand-offers-all">
                <span class="float-left">View All Brand Offers</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <?}?>

          

          <? if (!isset($website)){?>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5"><a href="?page=affiliate" style="color:#FFF;">+ ADD AFFILIATE PROGRAM</a>
                  <form name="change_affiliate" method="GET"><input type="hidden" name="page" value="affiliate">
                    <div class="input-group-append">
                      <select name="edit" onchange="this.form.submit()" class="form-control" style="width:210px;">
                        <option value="0">Select Affiliate To Edit...</option> 
                          <? foreach ($affiliate_programs as $affiliate) {echo ('<option value="'.$affiliate->ap_id.'">'.$affiliate->ap_name.'</option>'); }?>
                      </select>
                    </div>
                  </form>
                </div>
                <? echo ('<div class="mr-5"><a href="?page=affiliate-all" style="color:#FFF;">VIEW ALL PROGRAMS </a></div>');?>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="?page=affiliate-brands">
                <span class="float-left">View Brands</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <?}?>
          <? if (isset($website)&&isset($current_we_id) && $current_we_id > 0){?>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5"><a href="?page=image-upload" style="color:#FFF;">+ UPLOAD IMAGE</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="?page=image-all">
                <span class="float-left">View Images</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <? } ?>
          <?if (isset($website)&&isset($current_we_id) && $current_we_id > 0){?>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-info mb-3 o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-paw"></i>
                  </div>
                  <div class="mr-5"><a href="?page=menu-item" style="color:#FFF;">+ ADD MENU ITEM</a>
                    <form name="change_menu_items" method="GET"><input type="hidden" name="page" value="menu-item">
                      <div class="input-group-append">
                        <select name="edit" onchange="this.form.submit()" class="form-control" style="width:210px;">
                          <option value="0">Select Menu Item to Edit...</option> 
                          <?foreach ($menu_items_con as $menu_item){echo ('<option value="'.$menu_item->wm_id.'">'.$menu_item->wm_menu_item.'</option>'); }?>
                        </select>
                      </div>
                    </form>
                  </div>
                </div> 
                <a class="card-footer text-white clearfix small z-1" href="?page=menu-items-all">
                  <span class="float-left">View All Menu items</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div> 
          <?}?>  
        </div>