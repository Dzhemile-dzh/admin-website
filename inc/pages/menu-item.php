<form  id="menuItems" method="POST" enctype="multipart/form-data">
  <div class="form-subtitle">
     <h1><?if ($_GET['edit'] > 0){ echo 'Edit';} else{ echo 'Add'; }?> Menu Item</h1>
  </div>
    <div class="form-row">
      <?if(isset($_GET['edit']) && $_GET['edit'] > 0) {echo ('<input type="hidden" id="wm_id" name="wm_id" value="'.$menu_item_edit->wm_id.'">');}?>
      <input type="hidden" name="wm_we_id" id="wm_we_id" value="<? echo $current_we_id; ?>">
      <div class="form-group col-md-6">
        <label for="wm_we_id">Website</label>
        <input type="text" class="form-control" placeholder="<? echo $website->we_domain; ?>"disabled ;>
      </div>
      <div class="form-group col-md-6">
        <label for="wm_menu_item">Menu Item </label>
        <input type="text" class="form-control" id="wm_menu_item" name="wm_menu_item" <? if(isset($_GET['edit']) && $_GET['edit'] > 0) {?> value="<? echo $menu_item_edit->wm_menu_item; ?>"<?}else{?> required <?}?> >
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="wm_order">Order</label>
        <input type="text" class="form-control" id="wm_order" name="wm_order" <? if(isset($_GET['edit']) && $_GET['edit'] > 0) { ?> value="<? echo $menu_item_edit->wm_order; ?>"<?}else{?>placeholder="" required <?}?>>
      </div>
      <div class="form-group col-md-6">
        <label for="wm_active">Active</label>
          <div>
            <div class="custom-control custom-checkbox custom-control-inline">
              <?if($menu_item_edit->wm_active == 'y'){$valuech='y';$checked ='checked';}else{$valuech = 'n';$checked = '';} ?>
              <input type="checkbox" class="custom-control-input" id="wm_active" name="wm_active" onclick="<?if($valuech == 'y'){$valuech ='n';$checked ='checked';}else{$valuech = 'y';$checked = '';}?>" value="<? echo $valuech?>" <? echo $checked;?>>
              <label class="custom-control-label" for="wm_active"></label>
            </div>
          </div>
      </div>
    </div>
    <? if(isset($_GET['edit']) && $_GET['edit'] > 0) { ?>
        <input type="submit" class="btn btn-primary btn-lg" name="UPDATE_MENU_ITEM" value="UPDATE MENU ITEM">
    <? }else{ ?>
        <input type="submit" class="btn btn-primary btn-lg" name="ADD_MENU_ITEM" value="ADD MENU ITEM">
    <? } ?>
</form>