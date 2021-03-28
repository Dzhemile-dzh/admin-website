<form  id="affiliateForm" method="POST" enctype="multipart/form-data">
  <div class="form-subtitle">
     <h1><?if ($_GET['edit'] > 0){ echo 'Edit';} else{ echo 'Add'; }?> Affiliate Program</h1>
  </div>
    <div class="form-row">
      <?if(isset($_GET['edit']) && $_GET['edit'] > 0) { 
          echo ('<input type="hidden" name="ap_id" value="'.$affiliate_program_edit->ap_id.'">');
        }?>
      <div class="form-group col-md-6">
        <label for="ap_website">Website</label>
        <input type="text" class="form-control" id="ap_website" name="ap_website" <? if(isset($_GET['edit']) && $_GET['edit'] > 0) {?> value="<? echo $affiliate_program_edit->ap_website; ?>"<?}else{?>placeholder="bet365affiliates.com" required <? } ?>>
      </div>
      <div class="form-group col-md-6">
        <label for="ap_name">Name</label>
        <input type="text" class="form-control" id="ap_name" name="ap_name" <? if(isset($_GET['edit']) && $_GET['edit'] > 0) {?> value="<? echo $affiliate_program_edit->ap_name; ?>"<?}else{?> placeholder="Bet365 Affiliates" required <?}?> >
      </div>
    </div>
    <div class="form-group">
      <label for="ap_super_affiliate_link">Link</label>
      <input type="text" class="form-control" id="ap_super_affiliate_link" name="ap_super_affiliate_link" <? if(isset($_GET['edit']) && $_GET['edit'] > 0) { ?> value="<? echo $affiliate_program_edit->ap_super_affiliate_link; ?>"<?}else{?>placeholder="" required <?}?>>
    </div>
    <? if(isset($_GET['edit']) && $_GET['edit'] > 0) { ?>
        <input type="submit" class="btn btn-primary btn-lg" name="UPDATE_AFFILIATE" value="UPDATE AFFILIATE PROGRAM">
    <? }else{ ?>
        <input type="submit" class="btn btn-primary btn-lg" name="ADD_AFFILIATE" value="ADD AFFILIATE PROGRAM">
    <? } ?>
</form>