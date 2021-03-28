<form  id="contentContentForm" method="POST" enctype="multipart/form-data">
  <div class="form-subtitle">
    <h1><?if ($_GET['edit'] > 0){ echo 'Edit';} else{ echo 'Add'; }?> Content</h1>
  </div>
  <div class="form-row">
    <?if (isset($_GET['edit']) && $_GET['edit'] > 0){ echo ('<input type="hidden" name="wc_id" value="'.$wc_id.'">'); }?>
    <input type="hidden" name="wc_we_id" value="<? echo $current_we_id; ?>">
    <div class="form-group col-md-6">
      <input type="text" class="form-control" id="wc_title" name="wc_title" placeholder="Article Title..." <? if ($_GET['edit'] > 0) { ?> value="<? echo $contentedit->wc_title; ?>" <? }else{ ?> required <? } ?>>
    </div>
  </div>
  <div class="form-group">
    <textarea class="form-control" rows="5" cols="40" id="wc_body" name="wc_body"><? if ($_GET['edit'] > 0){ echo $contentedit->wc_body; }?></textarea>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="wc_category">Brand Name</label>
      <div>
        <select class="selectpicker" name="wc_ab_id" id="wc_ab_id">
          <option value="0">-</option>
          <?foreach ($affiliate_brands as $brand) {
              if ($_GET['edit'] > 0 && $brand->ab_id == $contentedit->wc_ab_id){ $selected = 'selected'; }else{ $selected = ''; }
                echo ('<option value="'.$brand->ab_id.'" '.$selected.'>'.$brand->ab_brand_name.'</option>');
          }?>
        </select>
      </div>
      <script>

        $('select').selectpicker(); 
        $('select[name=wc_ab_id]').val(1);
        $('.selectpicker').selectpicker('refresh');
      </script> 
    </div>
    <div class="form-group col-md-4">
      <label for="wc_verticals">Verticals</label>    
      <?if (isset($_GET['edit']) && $_GET['edit'] > 0) {?>
        <div>
          <select class="selectpicker" name="wc_verticals[]" data-max-options="5 "multiple title="<? echo $contentedit->wc_verticals; ?>" style="max-width:90%;">
           <?$wc_verticals = explode(',',$contentedit->wc_verticals);
              foreach ($verticalscon as $vertical) {
                if (in_array($vertical->ve_id, $wc_verticals)){ $selected = 'selected'; }else{ $selected = ''; }
                echo ('<option value="'.$vertical->ve_id.'" '.$selected.'>'.$vertical->ve_vertical.'('.$vertical->ve_id.')</option>');
            }?>
          </select>
        </div>

        <script>

          $('select').selectpicker();
          $('select[name=wc_verticals[]]').val(1);
          $('.selectpicker').selectpicker('refresh');
        </script>
      <?}else{ ?>
        <div>
          <select class="selectpicker" name="wc_verticals[]" data-max-options="5" multiple>
            <?foreach ($verticalscon as $vertical) { ?>
              <option value = "<? echo $vertical->ve_id ?>"> <? echo $vertical->ve_vertical;?> </option> 
            <?}?>
          </select>
        </div>
        <script>$('select').selectpicker();</script>    
      <?}?>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="wc_category">Category</label>
      <div>
        <select id="wc_category" name="wc_category"  class="selectpicker" <? if ($_GET['edit'] > 0) { echo ('title="'.$contentedit->wc_category.'"'); } ?> >
          <option value = "review" <? if ($_GET['edit'] > 0) { $contentedit->wc_category == 'review'?'selected': ''; } ?>>Review</option>
          <option value = "post" <? if ($_GET['edit'] > 0) { $contentedit->wc_category == 'post'?'selected': ''; } ?>>Post</option>
          <option value = "game" <? if ($_GET['edit'] > 0) { $contentedit->wc_category == 'game'?'selected': ''; } ?>>Game</option>
        </select>
      </div>
      <script>
        $('select').selectpicker(); 
        $('select[name=wc_category]').val(1);
        $('.selectpicker').selectpicker('refresh');
      </script> 
    </div>
    <div class="form-group col-md-4">
      <label for="wc_wm_id">Menu Item </label>
      <div>
        <select class="selectpicker" name="wc_wm_id" id="wc_wm_id">
          <option value="0">-</option>
          <?
            foreach ($menu_items_con as $menu_itemco) {
              if ($_GET['edit'] > 0 && $menu_itemco->wm_id == $contentedit->wc_wm_id){ $selected = 'selected'; }else{ $selected = ''; }
              echo ('<option value="'.$menu_itemco->wm_id.'" '.$selected.'>'.$menu_itemco->wm_menu_item.'</option>');
            }
          ?>
        </select>
      </div>
      <script>
        $('select').selectpicker(); 
        $('select[name=wc_wm_id]').val(1);
        $('.selectpicker').selectpicker('refresh');
      </script> 
    </div>
    <input type="hidden" name="wc_timestamp" id ="wc_timestamp" value="<? echo date("Y-m-d H:i:s"); ?>">
    <? if (isset($_GET['edit']) && $_GET['edit'] > 0) {?>
      <input type="hidden" name="wc_domain_id" id = "wc_domain_id" value="<? echo $contentedit->wc_domain_id; ?>" >
    <?}else{?>
      <input type="hidden" name="wc_domain_id" id = "wc_domain_id" value="<? echo $get_last_domain_id->last_id + 1; ?>" >
    <?}?>
    
  </div>
  <div align="right" style="margin-bottom:40px;">
    <? 
      if (isset($_GET['edit']) && $_GET['edit'] > 0) {
        echo ('<input type="submit" class="btn btn-primary btn-lg" name="UPDATE_CONTENT" value="UPDATE CONTENT">');
      }else{
        echo ('<input type="submit" class="btn btn-primary btn-lg" name="ADD_CONTENT" value="ADD CONTENT">');
      }
    ?>
  </div>
</form>